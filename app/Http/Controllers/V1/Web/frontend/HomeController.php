<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Banner\BannerRepositoryInterFace;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;
use App\Repositories\V1\Offer\OfferRepositoryInterFace;
use App\Models\Banner;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Repositories\V1\UserRole\UserRoleRepositoryInterface;
use App\Repositories\V1\News\NewsRepositoryInterface;
use App\Models\User;
use App\Http\Requests\Register\CreateRegisterRequest;
use App\Http\Requests\Register\EditRegisterRequest;
use App\Http\Requests\Register\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Cart;
use Illuminate\Support\Facades\Input;
use App\Models\Product;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Http\Requests\Bills\BillRequest;

class HomeController extends Controller
{
    protected $repoBanner;
    protected $repoFactory;
    protected $repoOffer;
    protected $repoUser;
    protected $repoUserRole;
    protected $repoNews;

    public function __construct(
        BannerRepositoryInterFace $repoBanner,
        FactoryRepositoryInterFace $repoFactory,
        OfferRepositoryInterFace $repoOffer,
        UserRepositoryInterFace $repositoryUser,
        UserRoleRepositoryInterFace $repositoryUserRole,
        NewsRepositoryInterFace $repoNews
    ) {
        $this->repoBanner = $repoBanner;
        $this->repoFactory = $repoFactory;
        $this->repoOffer = $repoOffer;
        $this->repoUser = $repositoryUser;
        $this->repoUserRole = $repositoryUserRole;
        $this->repoNews = $repoNews;
    }

    public function index()
    {
        $fatories = $this->repoFactory->index();
        $fat = $this->repoFactory->paginate(12);
        $banners = $this->repoBanner->paginate(5);
        $offers = $this->repoOffer->paginate(2);
        $news = $this->repoNews->paginate(4);

        return view('frontend.home.index', compact('fatories', 'banners', 'offers', 'fat', 'news'));
    }

    public function getRegister()
    {
        $fatories = $this->repoFactory->index();

        return view('frontend.register.index', compact('fatories'));
    }

    public function postRegister(CreateRegisterRequest $request)
    {
        $idUser = $this->repoUser->store($request->except('role'));
        if ($request->only('role')) {
            $this->repoUserRole->storeUserRole($idUser, $request->only('role'));

            return redirect()->route('fe.login')->with('msg', 'Đăng ký thành công');
        } else {
            return redirect()->route('fe.login')->with('msg', 'Đăng ký thành công');
        }
    }

    public function getEditRegister()
    {
        $fatories = $this->repoFactory->index();

        return view('frontend.register.edit', compact('fatories'));
    }

    public function postEditRegister(EditRegisterRequest $request, $id)
    {
        $this->repoUser->update($id, $request->except('role'));
        $this->repoUserRole->updateUserRole($id, $request->only('role'));

        return redirect()->route('fe.home.index')->with('msg', 'Edit Successful');
    }

    public function getLogin()
    {
        $fatories = $this->repoFactory->index();

        return view('frontend.register.login', compact('fatories'));
    }

    public function postLogin(LoginRequest $request)
    {
        $rs = $this->repoUser->login($request);

        if ($rs == 'email') {
            return redirect()->back()->with('msg', 'Email không tồn tại !');
        } elseif ($rs == 'password') {
            return redirect()->back()->with('msg', 'Password không chính xác !');
        }

        return redirect()->route('fe.home.index')->with('msg', 'Đăng nhập thành công !');
    }

    public function postLogout()
    {
        $this->repoUser->logout();

        return redirect()->back()->with('msg', 'Đăng xuất thành công !');
    }

    public function checkout()
    {
        $fatories = $this->repoFactory->index();
        $cart = Cart::getContent();
        $subtotal = Cart::getSubTotal();

        return view('frontend.carts.checkout', compact('fatories', 'cart', 'subtotal'));
    }

    public function addCart($id, Request $request)
    {
        $pro = Product::find($id);
        Cart::add([
            'id' => $pro->id,
            'name' => $pro->name,
            'quantity' => 1,
            'price' => $pro->price -($pro->price *($pro->promotion->percent /100)),
            'attributes' => [
                'promotion' => $pro->promotion->percent,
                'storage' => $pro->storage,
                'color' => $request->color,
            ],
        ]);
        $cart = Cart::getContent();

        return redirect()->back()->with('msg', 'Bạn đã thêm sản phẩm vào giỏ hàng thành công!!');
    }

    public function updateCart(Request $request)
    {
        Cart::update($request['rowId'], array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            ),
        ));

        return redirect()->back()->with('msg', 'Bạn đã chỉnh sửa giỏ hàng thành công!!');
    }

    public function deleteCart(Request $request)
    {
        Cart::remove($request['rowId']);

        return back()->with('msg', 'Bạn đã xóa giỏ hàng thành công!!');
    }

    public function pay()
    {
        $fatories = $this->repoFactory->index();

        return view('frontend.carts.pay', compact('fatories'));
    }

    public function store(BillRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        if (Cart::getContent()->count() == 0) {
            return back()->withErrors('Bạn chưa chọn sản phẩm nào');
        }
        //lấy dữ liệu để tạo order
        $price = 0;
        $data = [];
        $cart = Cart::getContent();
        $subtotal = Cart::getSubTotal();
        $price += $subtotal;
        $data['total'] = $price;
        $data['username'] = $request->username;
        $data['address'] = $request->address;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        if ($request->user_id != '') {
            $data['user_id'] = $request->user_id;
        }
        if ($request->note != '') {
            $data['note'] = $request->note;
        }
        Bill::create($data);
        //lấy dữ liệu để tạo order_detail
        $bill_id = Bill::orderBy('id', 'desc')->first()->id;
        $detail = [];
        foreach ($cart as $item){
            $detail['bill_id'] = $bill_id;
            $detail['product_id'] = $item->id;
            $detail['amount'] = $item->price * $item->quantity;
            //lấy lại giá gốc
            $item->price = ($item->price * 100) / (100 - $item->attributes['promotion']);
            $detail['price'] = $item->price;
            $detail['quantity'] = $item->quantity;
            $detail['product_name'] = $item->name;
            $detail['product_color'] = $item->attributes['color'];
            $detail['product_promotion'] = $item->attributes['promotion'];
            $detail['product_storage'] = $item->attributes['storage'];

            BillDetail::create($detail);
            $detail = [];
        }
        Cart::clear();
        $fatories = $this->repoFactory->index();

        return view('frontend.carts.success', compact('fatories'));
    }
}

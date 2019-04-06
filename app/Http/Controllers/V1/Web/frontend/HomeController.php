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

        return redirect()->back();
    }
}

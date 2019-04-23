<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Product\ProductRepositoryInterface;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;
use App\Repositories\V1\Comment\CommentRepositoryInterFace;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    protected $repoProduct;
    protected $repoFactory;
    protected $repoComment;


    public function __construct(
        ProductRepositoryInterface $repoProduct,
        FactoryRepositoryInterface $repoFactory,
        CommentRepositoryInterface $repoComment
    ) {
        $this->repoProduct = $repoProduct;
        $this->repoFactory = $repoFactory;
        $this->repoComment = $repoComment;
    }

    public function productNew()
    {
        $fatories = $this->repoFactory->index();
        $products = $this->repoProduct->paginate(12);

        return view('frontend.products.new', compact('products', 'fatories'));
    }

    public function detail($id, $slug)
    {
        Carbon::setLocale('vi');
        $productdetail = $this->repoProduct->detail($id);
        $fatories = $this->repoFactory->index();
        $anotherproduct = $this->repoProduct->anotherProduct($id);
        $comments = $this->repoComment->commment($productdetail->id);
        // Chuyển thời gian bình luận qua tiếng việt
        foreach ($comments as $item){
            $datetime = Carbon::createFromDate(date_format($item['updated_at'], 'd-m-Y h:i:s'));
            $dateComment = $datetime->diffForHumans();
        }
        $pagins = DB::table('comments')->where([
            ['product_id', $productdetail->id],
            ['parent_id', null],
            ['status', 1]
        ])->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('frontend.products.detail', compact('productdetail', 'fatories', 'anotherproduct', 'comments', 'dateComment', 'pagins'));
    }
}

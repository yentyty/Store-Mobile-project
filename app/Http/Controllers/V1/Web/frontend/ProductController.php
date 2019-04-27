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
        //Hiển thị danh sách bình luận
        $comments = $this->repoComment->commment($productdetail->id);
        // Hiển thị reply bình luận
        foreach ($comments as $item){
            $item->reply = $this->repoComment->commentReply($item->id);
        }

        return view('frontend.products.detail', compact('productdetail', 'fatories', 'anotherproduct', 'comments'));
    }
}

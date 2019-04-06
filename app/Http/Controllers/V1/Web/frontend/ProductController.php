<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Product\ProductRepositoryInterface;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;

class ProductController extends Controller
{
    protected $repoProduct;
    protected $repoFactory;


    public function __construct(
        ProductRepositoryInterface $repoProduct,
        FactoryRepositoryInterface $repoFactory
    ) {
        $this->repoProduct = $repoProduct;
        $this->repoFactory = $repoFactory;
    }

    public function productNew()
    {
        $fatories = $this->repoFactory->index();
        $products = $this->repoProduct->paginate(12);

        return view('frontend.products.new', compact('products', 'fatories'));
    }

    public function detail($id, $slug)
    {
        $productdetail = $this->repoProduct->detail($id);
        $fatories = $this->repoFactory->index();
        $anotherproduct = $this->repoProduct->anotherProduct($id);

        return view('frontend.products.detail', compact('productdetail', 'fatories', 'anotherproduct'));
    }
}
<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Product\ProductRepositoryInterFace;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;
use App\Repositories\V1\Promotion\PromotionRepositoryInterFace;
use App\Models\Product;
use Illuminate\Support\Collection;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\EditProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoProduct;
    protected $repoFactory;
    protected $repoPromotion;

    public function __construct(
        ProductRepositoryInterFace $repositoryProduct,
        FactoryRepositoryInterFace $repositoryFactory,
        PromotionRepositoryInterFace $repositoryPromotion
    ) {
        $this->repoProduct = $repositoryProduct;
        $this->repoFactory = $repositoryFactory;
        $this->repoPromotion = $repositoryPromotion;
    }

    public function index(Request $request)
    {
        $products = $this->repoProduct->paginate(10);

        if ($request['key']) {
            $products = $this->repoProduct->search($request['key']);
        }

        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promotion = $this->repoPromotion->listCreate();
        $factory = $this->repoFactory->listCreate();
        return view('backend.products.create', compact('promotion', 'factory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $this->repoProduct->store($request->all());

        return redirect()->route('product.index')->with('msg', 'Creation successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->repoProduct->find($id);

        return view('backend.products.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditNewsRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }
}

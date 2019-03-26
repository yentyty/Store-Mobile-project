<?php

namespace App\Repositories\V1\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use File;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->with('promotion', 'factory')->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $products = Product::where('name', 'LIKE', '%' . $key . '%')
            ->orwhere('storage', 'like', '%' . $key . '%')
            ->orwhere('color', 'like', '%' . $key . '%')
            ->paginate(10);
        $products->appends(['key' => $key]);

        return $products;
    }
}

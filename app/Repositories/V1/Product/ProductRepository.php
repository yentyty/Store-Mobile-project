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

    public function store($data)
    {
        $data['slug'] = str_slug($data['name']);
        $data['color'] = json_encode($data['color']);

        $images = [];
        $files =$data['image'];
        foreach ($files as $key => $file) {
            $extensionFile = $file -> getClientOriginalExtension();
            $filename = $key.'-'.time().'.'.$extensionFile;
            $file->move('uploads/images/products', $filename);
            $images[] = $filename;
        }
        $data['image'] = json_encode($images);

        $description = [
            'screen' => $data['screen'],
            'OS' => $data['OS'],
            'camera' => $data['camera'],
            'cpu' => $data['cpu'],
            'ram' => $data['ram'],
            'sim' => $data['sim'],
            'pin' => $data['pin'],
            'fingerprint' => $data['fingerprint'],
        ];
        $data['description'] = json_encode($description);

        return $this->model->create($data)->id;
    }

    public function update($id, $data)
    {
        $product = $this->model->find($id);
        $product->image = json_decode($product->image);
        $product->image = array_filter($product->image);
        $data['color'] = json_encode($data['color']);
        $image = [];
        if (isset($data['image'])) {
            $files =$data['image'];
            foreach ($files as $key => $file) {
                $extensionFile = $file -> getClientOriginalExtension();
                $filename = $key.'-'.time().'.'.$extensionFile;
                $file->move('uploads/images/products', $filename);
                $images[] = $filename;
                $data['image'] = json_encode($images);
            }
        } else {
            $data['image'] = json_encode($product->image);
        }
        $description = json_decode($product->description);
        $description = [
            'screen' => $data['screen'],
            'OS' => $data['OS'],
            'camera' => $data['camera'],
            'cpu' => $data['cpu'],
            'ram' => $data['ram'],
            'sim' => $data['sim'],
            'pin' => $data['pin'],
            'fingerprint' => $data['fingerprint'],
        ];
        $data['description'] = json_encode($description);
        return $product->update($data);
    }

    public function delete($id)
    {
        $product = $this->model->find($id);
        $someArrayPic = json_decode($product->image, true);
        $count = count($someArrayPic);
        for ($k = 0; $k < $count; $k++) {
            $nameImageOld = 'uploads/images/products/' . $someArrayPic[$k];
            if (!empty($nameImageOld) && File::exists($nameImageOld)) {
                unlink($nameImageOld);
            }
        }
        $product->delete();
    }

    public function countProduct()
    {
        $products = $this->model->count();

        return $products;
    }

    public function detail($id)
    {
        $productDetail = $this->model->find($id);

        return $productDetail;
    }

    public function anotherProduct($id)
    {
        $product = $this->model->find($id);
        $product = Product::where('factory_id', '=', $product->factory_id)
            ->where('id', '!=', $product->id)
            ->orderBy('updated_at', 'Desc')
            ->take(6)
            ->get();

        return $product;
    }
}

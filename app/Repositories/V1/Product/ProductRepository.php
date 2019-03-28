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

        $data['slug'] = str_slug($data['name']);
        $data['color'] = json_encode($data['color']);
        $file = json_encode($data['image']);
        $data['product'] = json_encode($data['image']);
        dd($data['product']);
        $product->image = json_decode($product->image);
        $data['image']= array_filter($product->image);
        dd($data['image']);
        $nameImageOld = json_encode($data['image']);
        dd($nameImageOld);
        foreach ($nameImageOld as $key => $file) {
            dd($file);
        }
        if (!empty($offer->image) && File::exists($nameImageOld)) {
            unlink($nameImageOld);
        }
        $inflightmags = [];

        if (isset($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/offers/' . $offer->image;
            if (!empty($offer->image) && File::exists($nameImageOld)) {
                unlink($nameImageOld);
            }
            $forder = ('uploads/images/offers');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['title']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $offer->image;
        }
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
}

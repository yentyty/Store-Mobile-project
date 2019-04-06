<?php

namespace App\Repositories\V1\Factory;

use App\Repositories\BaseRepository;
use App\Models\Factory;
use Illuminate\Support\Facades\DB;

class FactoryRepository extends BaseRepository implements FactoryRepositoryInterface
{
    public function getModel()
    {
        return Factory::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->with('products', 'offers')->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $factories = Factory::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $factories->appends(['key' => $key]);

        return $factories;
    }


    public function store($data)
    {
        $data['slug'] = str_slug($data['name']);

        return $this->model->create($data)->id;
    }

    public function update($id, $data)
    {
        $factorie = $this->model->find($id);
        $data['slug'] = str_slug($data['name']);

        return $factorie->update($data);
    }

    public function delete($id)
    {
        $factorie = $this->model->find($id);
        $factorie->delete();
    }

    public function listCreate()
    {
        $factories = $this->model::all();

        return $factories;
    }
}

<?php

namespace App\Repositories\V1\Information;

use App\Repositories\BaseRepository;
use App\Models\Information;
use Illuminate\Support\Facades\DB;

class InformationRepository extends BaseRepository implements InformationRepositoryInterface
{
    public function getModel()
    {
        return Information::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $informations = Information::where('title', 'LIKE', '%' . $key . '%')->paginate(5);
        $informations->appends(['key' => $key]);

        return $informations;
    }

    public function store($data)
    {
        $data['slug'] = str_slug($data['title']);

        return $this->model->create($data)->id;
    }

    public function update($id, $data)
    {
        $information = $this->model->find($id);
        $data['slug'] = str_slug($data['title']);

        return $information->update($data);
    }

    public function delete($id)
    {
        $information = $this->model->find($id);
        $information->delete();
    }


    public function detail($id)
    {
        $infoDetail = $this->model->find($id);

        return $infoDetail;
    }
}

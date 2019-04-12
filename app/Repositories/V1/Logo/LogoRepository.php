<?php

namespace App\Repositories\V1\Logo;

use App\Repositories\BaseRepository;
use App\Models\Logo;
use Illuminate\Support\Facades\DB;
use File;

class LogoRepository extends BaseRepository implements LogoRepositoryInterface
{
    public function getModel()
    {
        return Logo::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $logos = Logo::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $logos->appends(['key' => $key]);

        return $logos;
    }

    public function store($data)
    {
        if (isset($data['image'])) {
            $file = $data['image'];
            $data['slug'] = str_slug($data['name']);
            $forder = 'uploads/images/logos';
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = $data['slug'] . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        }

        return $this->model->create($data)->id;
    }

    public function delete($id)
    {
        $logo = $this->model->find($id);
        $nameImageOld = 'uploads/images/logos/' . $logo->image;
        if (!empty($logo->image) && File::exists($nameImageOld)) {
            unlink($nameImageOld);
        }

        $logo->delete();
    }
}

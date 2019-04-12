<?php

namespace App\Repositories\V1\Service;

use App\Repositories\BaseRepository;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use File;

class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    public function getModel()
    {
        return Service::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $services = Service::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $services->appends(['key' => $key]);

        return $services;
    }

    public function store($data)
    {
        if (isset($data['icon'])) {
            $file = $data['icon'];
            $data['slug'] = str_slug($data['name']);
            $forder = 'uploads/images/services';
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = $data['slug'] . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['icon'] = $fileName;
        }

        return $this->model->create($data)->id;
    }

    public function update($id, $data)
    {
        $service = $this->model->find($id);

        if (!empty($data['icon'])) {
            $file = $data['icon'];
            $nameImageOld = 'uploads/images/services/' . $service->icon;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/services');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['icon'] = $fileName;
        } else {
            $data['icon'] = $service->icon;
        }

        return $service->update($data);
    }

    public function delete($id)
    {
        $service = $this->model->find($id);
        $nameImageOld = 'uploads/images/services/' . $service->icon;
        if (!empty($service->icon) && File::exists($nameImageOld)) {
            unlink($nameImageOld);
        }

        $service->delete();
    }
}

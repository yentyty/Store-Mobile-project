<?php

namespace App\Repositories\V1\Role;

use App\Repositories\BaseRepository;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function getModel()
    {
        return Role::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $roles = Role::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $roles->appends(['key' => $key]);

        return $roles;
    }
}

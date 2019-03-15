<?php

namespace App\Repositories\V1\User;

use App\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $users = User::where('username', 'LIKE', '%' . $key . '%')->paginate(5);
        $users->appends(['key' => $key]);

        return $users;
    }
}

<?php

namespace App\Repositories\V1\UserRole;

use App\Repositories\BaseRepository;
use App\Models\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRoleRepository extends BaseRepository implements UserRoleRepositoryInterface
{
    public function getModel()
    {
        return UserRole::class;
    }

    public function storeUserRole($idUser, $data)
    {
        foreach ($data['role'] as $key => $dt) {
            $dataDetail = [
                'user_id' => $idUser,
                'role_id' => $dt,
            ];
            $this->model->create($dataDetail);
        }

        return ;
    }
}

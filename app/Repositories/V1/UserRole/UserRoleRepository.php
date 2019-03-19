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

    public function initUserRole($idUser)
    {
        $arrIdRole = [];
        $roles = DB::table('user_roles')
        ->select('role_id')
        ->where('user_id', $idUser)
        ->get();
        foreach ($roles as $key => $role) {
            $arrIdRole[] = $role->role_id;
        }

        return $arrIdRole;
    }

    public function updateUserRole($idUser, $data)
    {
        $roles = DB::table('user_roles')
        ->select('id')
        ->where('user_id', $idUser)
        ->get();
        foreach ($roles as $key => $role) {
            $this->model->find($role->id)->delete();
        }
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

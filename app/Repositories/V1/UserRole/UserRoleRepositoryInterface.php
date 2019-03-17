<?php

namespace App\Repositories\V1\UserRole;

interface UserRoleRepositoryInterface
{
    public function storeUserRole($idUser, $data);
}

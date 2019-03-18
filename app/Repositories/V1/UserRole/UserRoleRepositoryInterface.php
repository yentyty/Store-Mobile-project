<?php

namespace App\Repositories\V1\UserRole;

interface UserRoleRepositoryInterface
{
    public function storeUserRole($idUser, $data);

    public function initUserRole($idUser);

    public function updateUserRole($idUser, $data);
}

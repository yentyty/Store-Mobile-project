<?php

namespace App\Repositories\V1\User;

interface UserRepositoryInterface
{
    public function search($key);

    public function listCreate();
}

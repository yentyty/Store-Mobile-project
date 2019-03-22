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
}

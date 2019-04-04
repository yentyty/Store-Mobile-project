<?php

namespace App\Repositories\V1\Information;

interface InformationRepositoryInterface
{
    public function search($key);

    public function detail($id);
}

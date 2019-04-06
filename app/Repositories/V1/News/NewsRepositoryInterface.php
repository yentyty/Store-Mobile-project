<?php

namespace App\Repositories\V1\News;

interface NewsRepositoryInterface
{
    public function search($key);

    public function countNew();

    public function detail($id);
}

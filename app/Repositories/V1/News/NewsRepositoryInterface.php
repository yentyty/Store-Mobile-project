<?php

namespace App\Repositories\V1\News;

interface NewsRepositoryInterface
{
    public function search($key);
}
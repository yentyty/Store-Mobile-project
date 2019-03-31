<?php

namespace App\Repositories\V1\Product;

interface ProductRepositoryInterface
{
    public function search($key);

    public function countProduct();
}

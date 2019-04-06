<?php

namespace App\Repositories\V1\Factory;

interface FactoryRepositoryInterface
{
    public function search($key);

    public function listCreate();

    public function postFactory($id);
}

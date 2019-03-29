<?php

namespace App\Repositories\V1\Bill;

interface BillRepositoryInterface
{
    public function search($key);

    public function changestatus($data);
}

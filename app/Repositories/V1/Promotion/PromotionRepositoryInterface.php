<?php

namespace App\Repositories\V1\Promotion;

interface PromotionRepositoryInterface
{
    public function search($key);

    public function changestatus($data);
}

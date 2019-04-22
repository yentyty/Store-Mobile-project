<?php

namespace App\Repositories\V1\Bill;

interface BillRepositoryInterface
{
    public function search($key);

    public function changestatus($data);

    public function pdfexport($id);

    public function countBill();

    public function staticProduct($month, $year);

    public function staticBill($month, $year);

    public function getbill($id);
}

<?php

namespace App\Repositories\V1\Bill;

use App\Repositories\BaseRepository;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use File;

class BillRepository extends BaseRepository implements BillRepositoryInterface
{
    public function getModel()
    {
        return Bill::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->with('user', 'billDetails')->orderBy('updated_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $bills = Bill::where('username', 'LIKE', '%' . $key . '%')
            ->orwhere('id', 'like', '%' . $key . '%')
            ->orwhere('total', 'like', '%' . $key . '%')
            ->orwhere('created_at', 'like', '%' . $key . '%')
            ->paginate(10);
        $bills->appends(['key' => $key]);

        return $bills;
    }

    public function changestatus($data)
    {
        $id = $data['id'];
        $bill = $this->model->find($id);
        $bill->status = !$bill->status;
        $bill->save();

        return response()->json($bill);
    }

    public function delete($id)
    {
        $bill = $this->model->find($id);
        $bill->delete();
    }

    public function pdfexport($id)
    {
        return $this->model->find($id);
    }

    public function countBill()
    {
        $bills = $this->model->count();

        return $bills;
    }

    public function staticProduct($month, $year)
    {
        $products = DB::table('bill_details')
        ->select(DB::raw('*, SUM(bill_details.quantity) as qty'))
        ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
        ->where('status', '!=', 0)
        ->whereMonth('bills.created_at', $month)
        ->whereYear('bills.created_at', $year)
        ->groupBy("bill_details.product_id")
        ->take(10)
        ->get();

        return $products;
    }

    public function staticBill($month, $year)
    {
        $bills = DB::table('bills')
        ->where('status', '!=', 0)
        ->whereMonth('bills.created_at', $month)
        ->whereYear('bills.created_at', $year)
        ->take(10)
        ->get();

        return $bills;
    }
}

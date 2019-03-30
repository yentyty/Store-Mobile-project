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
}

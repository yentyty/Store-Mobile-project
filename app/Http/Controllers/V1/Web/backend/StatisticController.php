<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Repositories\V1\Bill\BillRepositoryInterFace;

class StatisticController extends Controller
{
    /**
     * Display listing of products order by descending sell quantity in month
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected $repoBill;

    public function __construct(
        BillRepositoryInterFace $repositoryBill
    ) {
        $this->repoBill = $repositoryBill;
    }

    public function getProductBill(Request $request)
    {
        if(empty($request->month)){
            $request->month = date('m');
        }
        if(empty($request->year)){
            $request->year = date('Y');
        }
        $products = $this->repoBill->staticProduct($request['month'], $request['year']);

        return view('backend.statistics.staticproduct', ['products'=>$products]);
    }

    public function getBill(Request $request)
    {
        if(empty($request->month)){
            $request->month = date('m');
        }
        if(empty($request->year)){
            $request->year = date('Y');
        }
        $bills = $this->repoBill->staticBill($request['month'], $request['year']);

        return view('backend.statistics.staticbill', ['bills'=>$bills]);
    }
}

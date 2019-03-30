<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Bill\BillRepositoryInterFace;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;
use App\Models\Bill;
use Illuminate\Support\Collection;
use App\Http\Requests\Bills\CreateBillRequest;
use App\Http\Requests\Bills\EditBillRequest;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoBill;
    protected $repoFactory;

    public function __construct(
        BillRepositoryInterFace $repositoryBill,
        FactoryRepositoryInterFace $repositoryFactory
    ) {
        $this->repoBill = $repositoryBill;
        $this->repoFactory = $repositoryFactory;
    }

    public function index(Request $request)
    {
        $bills = $this->repoBill->paginate(10);

        if ($request['key']) {
            $bills = $this->repoBill->search($request['key']);
        }

        return view('backend.bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = $this->repoBill->find($id);

        return view('backend.bills.detail', compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }

    public function changestatus(Request $request)
    {
        $data = $request->all();

        return $this->repoBill->changestatus($data);
    }
}

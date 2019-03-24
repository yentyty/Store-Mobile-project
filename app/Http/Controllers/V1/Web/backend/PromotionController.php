<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Promotion\PromotionRepositoryInterFace;
use App\Models\Promotion;
use Illuminate\Support\Collection;
use App\Http\Requests\Promotions\CreatePromotionRequest;
use App\Http\Requests\Promotions\EditPromotionRequest;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoPromotion;

    public function __construct(PromotionRepositoryInterFace $repositoryPromotion)
    {
        $this->repoPromotion = $repositoryPromotion;
    }

    public function index(Request $request)
    {
        $promotions = $this->repoPromotion->paginate(10);

        if ($request['key']) {
            $promotions = $this->repoPromotion->search($request['key']);
        }

        return view('backend.promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePromotionRequest $request)
    {
        $this->repoPromotion->store($request->all());
        return redirect()->route('promotion.index')->with('msg', 'Creation successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = $this->repoPromotion->find($id);
        return view('backend.promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPromotionRequest $request, $id)
    {
        $data = $request->all();
        $this->repoPromotion->update($id, $data);

        return redirect()->route('promotion.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoPromotion->delete($id);

        return redirect()->route('promotion.index')->with('msg', 'Delete successful');
    }

    public function changestatus(Request $request)
    {
        $data = $request->all();

        return $this->repoPromotion->changestatus($data);
    }
}

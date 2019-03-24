<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Offer\OfferRepositoryInterFace;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;
use App\Models\Offer;
use Illuminate\Support\Collection;
use App\Http\Requests\Offers\CreateOfferRequest;
use App\Http\Requests\Offers\EditOfferRequest;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoOffer;
    protected $repoFactory;

    public function __construct(
        OfferRepositoryInterFace $repositoryOffer,
        FactoryRepositoryInterFace $repositoryFactory
    ) {
        $this->repoOffer = $repositoryOffer;
        $this->repoFactory = $repositoryFactory;
    }

    public function index(Request $request)
    {
        $offers = $this->repoOffer->paginate(10);
        if ($request['key']) {
            $offers = $this->repoOffer->search($request['key']);
        }

        return view('backend.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factory = $this->repoFactory->listCreate();

        return view('backend.offers.create', compact('factory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOfferRequest $request)
    {
        $this->repoOffer->store($request->all());

        return redirect()->route('offer.index')->with('msg', 'Creation successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = $this->repoOffer->find($id);

        return view('backend.offers.detail', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = $this->repoOffer->find($id);
        $factory = $this->repoFactory->listCreate();

        return view('backend.offers.edit', compact('offer', 'factory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditOfferRequest $request, $id)
    {
        $data = $request->all();
        $this->repoOffer->update($id, $data);

        return redirect()->route('offer.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoOffer->delete($id);

        return redirect()->route('offer.index')->with('msg', 'Delete successful');
    }
}

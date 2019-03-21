<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Information\InformationRepositoryInterFace;
use App\Models\Information;
use Illuminate\Support\Collection;
use App\Http\Requests\Informations\CreateInformationRequest;
use App\Http\Requests\Informations\EditInformationRequest;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoInformation;

    public function __construct(
        InformationRepositoryInterFace $repositoryInformation
    ) {
        $this->repoInformation = $repositoryInformation;
    }

    public function index(Request $request)
    {
        $informations = $this->repoInformation->paginate(10);
        if ($request['key']) {
            $informations = $this->repoInformation->search($request['key']);
        }

        return view('backend.informations.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.informations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInformationRequest $request)
    {
        $this->repoInformation->store($request->all());

        return redirect()->route('information.index')->with('msg', 'Creation successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = $this->repoInformation->find($id);

        return view('backend.informations.detail', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = $this->repoInformation->find($id);

        return view('backend.informations.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditInformationRequest $request, $id)
    {
        $data = $request->all();
        $this->repoInformation->update($id, $data);

        return redirect()->route('information.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoInformation->delete($id);

        return redirect()->route('information.index')->with('msg', 'Delete successful');
    }
}

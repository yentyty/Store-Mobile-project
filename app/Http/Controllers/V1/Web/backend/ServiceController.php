<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Service\ServiceRepositoryInterFace;
use App\Models\Service;
use Illuminate\Support\Collection;
use App\Http\Requests\Services\CreateServiceRequest;
use App\Http\Requests\Services\EditServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoService;

    public function __construct(ServiceRepositoryInterFace $repoService)
    {
        $this->repoService = $repoService;
    }

    public function index(Request $request)
    {
        $services = $this->repoService->paginate();
        if ($request['key']) {
            $services = $this->repoService->search($request['key']);
        }

        return view('backend.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request)
    {
        $this->repoService->store($request->all());

        return redirect()->route('service.index')->with('msg', 'Creation successful');
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
        $service = $this->repoService->find($id);

        return view('backend.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditServiceRequest $request, $id)
    {
        $data = $request->all();
        $this->repoService->update($id, $data);

        return redirect()->route('service.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoService->delete($id);

        return redirect()->route('service.index')->with('msg', 'Delete successful');
    }
}

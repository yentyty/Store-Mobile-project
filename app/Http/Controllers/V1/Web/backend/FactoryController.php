<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;
use App\Models\Factory;
use Illuminate\Support\Collection;
use App\Http\Requests\Factories\CreateFactoryRequest;
use App\Http\Requests\Factories\EditFactoryRequest;

class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoFactory;

    public function __construct(FactoryRepositoryInterFace $repositoryFactory)
    {
        $this->repoFactory = $repositoryFactory;
    }

    public function index(Request $request)
    {
        $factories = $this->repoFactory->paginate(10);

        if ($request['key']) {
            $factories = $this->repoFactory->search($request['key']);
        }

        return view('backend.factories.index', compact('factories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.factories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFactoryRequest $request)
    {
        $this->repoFactory->store($request->all());

        return redirect()->route('factory.index')->with('msg', 'Creation successful');
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
        $factory = $this->repoFactory->find($id);

        return view('backend.factories.edit', compact('factory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFactoryRequest $request, $id)
    {
        $data = $request->all();
        $this->repoFactory->update($id, $data);

        return redirect()->route('factory.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoFactory->delete($id);

        return redirect()->route('factory.index')->with('msg', 'Delete successful');
    }
}

<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Logo\LogoRepositoryInterFace;
use App\Models\Logo;
use Illuminate\Support\Collection;
use App\Http\Requests\Logos\CreateLogoRequest;
use App\Http\Requests\Logos\EditLogoRequest;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoLogo;

    public function __construct(LogoRepositoryInterFace $repoLogo)
    {
        $this->repoLogo = $repoLogo;
    }

    public function index(Request $request)
    {
        $logos = $this->repoLogo->paginate();
        if ($request['key']) {
            $logos = $this->repoLogo->search($request['key']);
        }

        return view('backend.logos.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.logos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLogoRequest $request)
    {
        $this->repoLogo->store($request->all());

        return redirect()->route('logo.index')->with('msg', 'Creation successful');
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
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditLogoRequest $request, $id)
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
        $this->repoLogo->delete($id);

        return redirect()->route('logo.index')->with('msg', 'Delete successful');
    }
}

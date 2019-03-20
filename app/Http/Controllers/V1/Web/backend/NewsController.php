<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\News\NewsRepositoryInterFace;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Models\News;
use Illuminate\Support\Collection;
use App\Http\Requests\News\CreateNewsRequest;
use App\Http\Requests\News\EditNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoNews;
    protected $repoUser;

    public function __construct(
        NewsRepositoryInterFace $repositoryNews,
        UserRepositoryInterFace $repositoryUser
    ) {
        $this->repoNews = $repositoryNews;
        $this->repoUser = $repositoryUser;
    }

    public function index(Request $request)
    {
        $news = $this->repoNews->paginate(10);
        if ($request['key']) {
            $news = $this->repoNews->search($request['key']);
        }

        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->repoUser->listCreate();

        return view('backend.news.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsRequest $request)
    {
        $this->repoNews->store($request->all());

        return redirect()->route('news.index')->with('msg', 'Creation successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = $this->repoNews->find($id);

        return view('backend.news.detail', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = $this->repoNews->find($id);
        $user = $this->repoUser->listCreate();

        return view('backend.news.edit', compact('new', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditNewsRequest $request, $id)
    {
        $data = $request->all();
        $this->repoNews->update($id, $data);

        return redirect()->route('news.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoNews->delete($id);

        return redirect()->route('news.index')->with('msg', 'Delete successful');
    }
}

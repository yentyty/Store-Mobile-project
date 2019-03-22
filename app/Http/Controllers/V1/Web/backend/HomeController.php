<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Role\RoleRepositoryInterFace;
use App\Repositories\V1\Contact\ContactRepositoryInterFace;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Repositories\V1\News\NewsRepositoryInterFace;
use App\Models\Role;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoRole;
    protected $repoContact;
    protected $repoUser;
    protected $repoNews;

    public function __construct(
        RoleRepositoryInterFace $repositoryRole,
        ContactRepositoryInterFace $repositoryContact,
        UserRepositoryInterFace $repositoryUser,
        NewsRepositoryInterFace $repositoryNews
    ) {
        $this->repoRole = $repositoryRole;
        $this->repoContact = $repositoryContact;
        $this->repoUser = $repositoryUser;
        $this->repoNews = $repositoryNews;
    }

    public function index(Request $request)
    {
        $roles = $this->repoRole->index();
        $contacts = $this->repoContact->paginate(4);
        $users = $this->repoUser->countUser();
        $news = $this->repoNews->countNew();

        return view('backend.home.index', compact('roles', 'contacts', 'users', 'news'));
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
    public function update(EditOfferRequest $request, $id)
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
}

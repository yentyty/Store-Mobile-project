<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Repositories\V1\Role\RoleRepositoryInterFace;
use App\Repositories\V1\UserRole\UserRoleRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;
use App\Http\Requests\Users\CreateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoUser;
    protected $repoRole;
    protected $repoUserRole;

    public function __construct(
        UserRepositoryInterFace $repositoryUser,
        RoleRepositoryInterFace $repositoryRole,
        UserRoleRepositoryInterFace $repositoryUserRole
    )
    {
        $this->repoUser = $repositoryUser;
        $this->repoRole = $repositoryRole;
        $this->repoUserRole = $repositoryUserRole;
    }

    public function index(Request $request)
    {
        $users = $this->repoUser->paginate(10);

        if ($request['key']) {
            $users = $this->repoUser->search($request['key']);
        }
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = $this->repoUser->paginate();
        $roles = $this->repoRole->index();
        if ($request['key']) {
            $users = $this->repoUser->search($request['key']);
        }

        return view('backend.users.create', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $idUser = $this->repoUser->store($request->except('role'));
        if ($request->only('role')) {
            $this->repoUserRole->storeUserRole($idUser, $request->only('role'));

            return redirect()->route('user.create')->with('msg', 'Creation successful');
        } else {

            return redirect()->route('user.create')->with('msg', 'Creation successful');
        }
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
}

<?php
namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Http\Requests\Register\LoginRequest;

class AdminController extends Controller
{
    protected $repository;

    public function __construct(UserRepositoryInterFace $repository)
    {
        $this->repository = $repository;
    }

    public function getLogin()
    {
        if (!Auth::user()) {
            return view('backend.login');
        }

        return redirect()->route('home.index');
    }

    public function postLogin(LoginRequest $request)
    {
        $rs = $this->repository->login($request);

        if ($rs == 'email') {
            return redirect()->back()->with('msg', 'Email không tồn tại !');
        } elseif ($rs == 'password') {
            return redirect()->back()->with('msg', 'Password không chính xác !');
        }
        $h = \App\Models\User::with('roles')->find(Auth::id());
        $roles = $h->roles;
        foreach ($roles as $role) {
            if ($role->id == ROLE_ADMIN) {
                return redirect()->route('home.index')->with('msg', 'Admin Logged in successfully !');
            }
            if ($role->id == ROLE_SALE) {
                return redirect()->route('home.index')->with('msg', 'Salesman Logged in successfully !');
            }
            if ($role->id == ROLE_WRITER) {
                return redirect()->route('contact.index')->with('msg', 'Post staff successfully logged in !');
            }
            if ($role->id == ROLE_CUSTOMER) {
                return redirect()->route('fe.home.index')->with('msg', 'Bạn đã đăng nhập thành công !');
            }
        }

        return redirect()->route('home.index')->with('msg','Logged in successfully !');
    }

    public function logout()
    {
        $this->repository->logout();

        return redirect()->back()->with('msg', 'Logout in successfully !');
    }
}

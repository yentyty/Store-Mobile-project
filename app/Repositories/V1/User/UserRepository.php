<?php

namespace App\Repositories\V1\User;

use App\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $users = User::where('username', 'LIKE', '%' . $key . '%')->paginate(5);
        $users->appends(['key' => $key]);

        return $users;
    }

    public function store($data)
    {
        $data['password'] = bcrypt($data['password']);
        if (isset($data['avatar'])) {
            $file = $data['avatar'];
            $data['slug'] = str_slug($data['avatar']);

            $forder = 'uploads/images/users';
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = $data['slug'] . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['avatar'] = $fileName;
        }

            return $this->model->create($data)->id;
    }

    public function update($id, $data)
    {
        $user = $this->model->find($id);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        if (isset($data['avatar'])) {
            $file = $data['avatar'];
            $nameImageOld = 'uploads/images/users/' . $user->avatar;
            if (!empty($user->avatar) && File::exists($nameImageOld)) {
                unlink($nameImageOld);
            }
            $forder = ('uploads/images/users');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['avatar'] = $fileName;
        } else {
            $data['avatar'] = $user->avatar;
        }

        return $user->update($data);
    }

    public function delete($id)
    {
        $user = $this->model->find($id);
        $nameImageOld = 'uploads/images/users/' . $user->avatar;
        if (!empty($user->avatar) && File::exists($nameImageOld)) {
            unlink($nameImageOld);
        }

        $user->delete();
    }

    public function listCreate()
    {
        $users = $this->model::all();

        return $users;
    }

    public function countUser()
    {
        $users = $this->model->count();

        return $users;
    }

    public function login($request)
    {

        $user = $this->model->where('email', $request->email)->first();
        if (! $user) {
            return 'email';
        }
        if (! Hash::check($request->password, $user['password'])) {
            return 'password';
        }
        $data = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($data)) {
            return 1;
        }
        return 'success';
    }

    public function logout()
    {
        return Auth::logout();
    }
}

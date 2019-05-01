<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $allowAccess = false;
            $h =  \App\Models\User::with('roles')->find(Auth::id());
            $roles = $h->roles;
            foreach ($roles as $role) {
                if ($role->id == ROLE_ADMIN || $role->id == ROLE_SALE || $role->id == ROLE_WRITER || $role->id == ROLE_CUSTOMER) {
                    $allowAccess = true;
                    break;
                }
            }
            if ($allowAccess) {
                return $next($request);
            }
            return redirect('admin/login')->with('thongbao', 'Bạn không có quyền truy cập!');
        }
        return redirect('admin/login')->with('thongbao', 'Bạn chưa đăng nhập!');
    }
}

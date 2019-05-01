<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class SaleMiddleware
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
                if ($role->id == ROLE_ADMIN || $role->id == ROLE_SALE) {
                    $allowAccess = true;
                    break;
                }
            }
            if ($allowAccess) {
                return $next($request);
            }
            return new Response(view('backend.erorr.role'));
        }
        return redirect('admin/login')->with('thongbao', 'Bạn chưa đăng nhập!');
    }
}

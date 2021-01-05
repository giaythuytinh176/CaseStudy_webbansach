<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class permissionAccessUserAdmin extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //if ($this->userCan('page-user-admin')) {
        $user = new User();
        if ($user->can('user.view', Auth::user())) {
            return $next($request);
        }
         //return abort(403, 'Unauthorized action.');
        return response()->view('backend.user.403', ['permission' => 'Bạn không có quyền truy cập!!!']);
    }
}

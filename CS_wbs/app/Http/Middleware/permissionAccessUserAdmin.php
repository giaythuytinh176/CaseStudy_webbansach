<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;

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
        if ($this->userCan('page-user-admin')) {
            return $next($request);
        }
        //return abort(403, 'Unauthorized action.');
        return response()->view('backend.user.403', ['permission' => 'Bạn không có quyền truy cập!!!']);
    }
}

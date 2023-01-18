<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class CheckGuard {
    public function handle(Request $request, Closure $next) {
        if(!auth('admin')->check() && !$request->is('admin/*') && !$request->is('admin')) {
            return redirect()->route('admin.login')->with('error', trans('dashboard/auth.login_first'));
        }
        return $next($request);
    }
}
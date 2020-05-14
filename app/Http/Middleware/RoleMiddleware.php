<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
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
/*        if($request->input('email')){
            $user = User::where('email',$request->input('email'))->first();
            if ($user->is_admin != 1) {
                session()->flash('danger','您不是管理员');
                return redirect('login');
            }
        }*/
        if (Auth::id() != 1 ){
            return redirect('/prompt');
        }
        return $next($request);
    }
}

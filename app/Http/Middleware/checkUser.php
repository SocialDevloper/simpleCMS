<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkUser
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
        $user = Auth::user();
        $role = $user->roles->pluck('name')->toArray();
        if(in_array('Super Admin', $role))
        {
            /*Session*/
            //Session::put('loggedUser', $user->name);
            session()->put('loggedUser', $user->name);
            $request->session()->flash('status', 'You are Super Admin no need to access Home !!');
            return redirect('admin'); 
        }
        else
        {
           return $next($request);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Session;
use Auth;
class IsAdmin
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
         $role = Auth::user()->role_id;
         if($role != '1'){
             return  redirect('/');
         }else{
             return $next($request);
         }
    }
}

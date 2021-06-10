<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsVoter
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
         if($role != '2'){
             return  redirect('admin/index');
         }else{
             return $next($request);
         }
    }
}

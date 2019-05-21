<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminLogined
{
    
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $user =Auth::user();
            if($user->role ==1){
                 return $next($request);
            }
            else{
                return redirect('admin/login');
            }

        }
        else
        {
            return redirect('admin/login');
        }




        
    }
}

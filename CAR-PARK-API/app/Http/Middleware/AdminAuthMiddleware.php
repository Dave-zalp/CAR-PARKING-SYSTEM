<?php

namespace App\Http\Middleware;

use App\Traits\HttpResponses;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    use HttpResponses;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()){
            $user = Auth::user();
            if($user->status == 'admin'){
                return $next($request);
            }
            else{
                return $this->error('',401,"You are not allowed to access this resource");
            }
        }
        else{
            return $this->error('',401,"You are not allowed to access this resource");
        }


    }
}

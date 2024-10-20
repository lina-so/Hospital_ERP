<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckReceptionistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$job_title): Response
    {
        if(Auth::guard('employee')->check() && Auth::guard('employee')->user()->job_title == $job_title )
        {
            return $next($request);
        }
        return response()->json(['error'=>'You do not have access to this action','status_code'=>403],403);
    }
}

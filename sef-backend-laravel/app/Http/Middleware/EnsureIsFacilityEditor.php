<?php

namespace App\Http\Middleware;

use App\Traits\PermissionSec;
use Closure;
use Illuminate\Http\Request;


class EnsureIsFacilityEditor
{

    use PermissionSec;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $isFacilityEditor = $this->isUserFacilityEditor();

        if( $isFacilityEditor ){
            return $next($request);
        }else{
            return response(['Declined.'], 401);
        }

    }
}

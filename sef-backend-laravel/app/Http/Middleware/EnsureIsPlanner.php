<?php

namespace App\Http\Middleware;

use App\Helpers\ExternalHelper;
use App\Traits\PermissionSec;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EnsureIsPlanner
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

        $provincesByUser = array();

        //  ----------------    GET ALL PERMISSIONS BY USER
        $allRolesByUser = DB::table('sec_role_user')
            ->where('user_id', auth('sanctum')->user()->sec_user_id)
            ->pluck('role_id')
            ->toArray();

        //  ----------------    GO THROUGH ALL PERMISSIONS AND CHECK IF IN PLANNING
        foreach($allRolesByUser as $r){

            //  ----------------    GET USER ROLES FOR PLANNING
            $getRole = ExternalHelper::plannersByProvince( $r );

            if( $getRole != false )
                array_push( $provincesByUser, $getRole);

        }

        if( count($provincesByUser) > 0 ){
            return $next($request);
        }else{
            return response(['Declined.'], 401);
        }

    }
}

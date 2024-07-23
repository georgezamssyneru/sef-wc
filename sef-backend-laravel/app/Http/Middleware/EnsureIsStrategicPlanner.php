<?php

namespace App\Http\Middleware;

use App\Helpers\ExternalHelper;
use App\Traits\PermissionSec;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EnsureIsStrategicPlanner
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

        $isPlanner = array();

        //  ----------------    GET ALL PERMISSIONS BY USER
        $allRolesByUser = DB::table('sec_role_user')
            ->where('user_id', auth('sanctum')->user()->sec_user_id)
            ->pluck('role_id')
            ->toArray();

        //  ----------------    GO THROUGH ALL PERMISSIONS AND CHECK IF IN PLANNING
        foreach( $allRolesByUser as $r ){

            //  ----------------    GET USER ROLES FOR PLANNING
            $getInfraPlanner = ExternalHelper::strategicPlanner( $r );

            if( $getInfraPlanner != false )
                array_push( $isPlanner, $getInfraPlanner);

        }

        if( count( $isPlanner ) > 0 ){
            return $next($request);
        }else{
            return response(['Declined.'], 401);
        }

    }
}

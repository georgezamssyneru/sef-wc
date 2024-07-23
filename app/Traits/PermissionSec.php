<?php

namespace App\Traits;

use App\Models\AppComponent;
use App\Models\AppComponentInstance;
use App\Models\SecCache;
use App\Models\SecRoleUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

trait PermissionSec
{

    public $menu = [];

    public $components = [];

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getMenuComponents( $user, $request )
    {

        $getCache = [];

        //  ------- REQUEST ON CACHE TABLE
        //  IF COMING FROM ADMINISTRATION APP
        if( $request['type'] ){
            $getCache = SecCache::where([
                ['user_id', $user->sec_user_id ],
                ['role_id', env('ROLE_APP_ADMIN')],
                ['can_view', '1']
            ])->distinct()->get();
        }else{
            $getCache = SecCache::where([
                ['user_id', $user->sec_user_id ],
                ['can_view', '1']
            ])->whereIn('role_id', [ env('ROLE_APP_USER'), env('ROLE_APP_INFRASTRUCTURE_PLANNER'), env('ROLE_APP_STRATEGIC_PLANNER'), env('ROLE_IMPLEMENTING_AGENT') ])->distinct()->get();
        }

        if(!$getCache)
            return false;

        foreach ($getCache as $cache){

            /** @todo place relationship */
            $appComponent = AppComponent::find( $cache->ref3 );

            if( isset($appComponent->app_component_id) ){
                $comp = array(
                    'app_component_id'  =>  $appComponent->app_component_id,
                    'displayName'   => trim($appComponent->component_name),
                    'url'           => trim($appComponent->route),
                    'icon'          => trim($appComponent->icon),
                    'json_params'   => json_decode($appComponent->json_params)
                );

                array_push( $this->menu, $comp );
            }

        }

        return $this->menu;

    }

    /**
     * @param $user
     * @param $request
     */
    public function getUsersRole( $user, $request ){

    }

    /**
     * @param $user
     * @param $request
     * @return bool
     */
    public function getComponentInstance( $user, $request )
    {

        $getCache = [];

        //  ------- REQUEST ON CACHE TABLE
        //  IF COMING FROM ADMINISTRATION APP
        if( $request['type'] ){
            $getCache = SecCache::where([
                ['user_id', $user->sec_user_id ],
                ['role_id', env('ROLE_APP_ADMIN')],
                ['can_view', '1']
            ])->distinct()->get();
        }else{
            $getCache = SecCache::where([
                ['user_id', $user->sec_user_id ],
                ['role_id', env('ROLE_APP_USER')],
                ['can_view', '1']
            ])->distinct()->get();
        }

        if(!$getCache)
            return false;

        //  --------  GET COMPONENT INSTANCE BY ID
        $appComponent = AppComponentInstance::where('component_id', $request->component_id )->get();

        return $appComponent;

    }

    /**
     * @return bool
     */
    public function isUserAdmin(){

        $user = auth()->id();

        if(!$user)
            return false;

        $hasAccess = SecRoleUser::where([
            ['user_id', auth()->id() ],
            ['role_id', env('ROLE_APP_ADMIN')]
        ])->first();

        if( $hasAccess ){
            return true;
        }else{
            return false;
        }

    }

    /**
     * CHECK TO SEE IF USER FACILITY EDITOR
     * @return bool
     */
    public function isUserFacilityEditor(){

        $user = auth()->id();

        if(!$user)
            return false;

        $hasAccess = SecRoleUser::where([
            ['user_id', auth()->id() ],
            ['role_id', env('ROLE_FACILITY_EDITOR')]
        ])->first();

        if( $hasAccess ){
            return true;
        }else{
            return false;
        }

    }

    /**
     * CHECK TO SEE IF USER IS A PLANNER OF SOME SORT
     * @return bool
     */
    public function isUserPlanner(){

        $user = auth()->id();

        if(!$user)
            return false;

        $hasAccess = SecRoleUser::where([
            ['user_id', auth()->id() ],
            ['role_id', env('ROLE_FACILITY_EDITOR')]
        ])->first();

        if( $hasAccess ){
            return true;
        }else{
            return false;
        }

    }

}
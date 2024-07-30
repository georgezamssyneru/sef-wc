<?php
namespace Hip\PackageMapManagement\Http\Controllers;

use App\Events\EventHistory;
use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
use App\Models\AppMap;
use App\Models\AppMapLink;
use App\Models\SecCache;
use App\Models\SecPermission;
use App\Models\SecPermissionLink;
use App\Models\SecRoleLink;
use App\Models\SecRoleType;
use App\Models\SecRoleUser;
use App\Models\SecRole;
use App\Traits\PermissionSec;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Str;
use Nette\Schema\ValidationException;
use Validator;
use App\Models\User;


class PackageMapsController extends Controller
{

    use PermissionSec;

    public function test()
    {
       
        return response()
            ->json(['success'=>true ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMap( Request $request ){

        $validator = Validator::make($request->all(),[
            'map_name'     => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        try {

            //  ------------    CHECK IF EXISTS AND JUST UPDATE AGAIN OR CREATE ROLE FOR USER
            $createSecRole = AppMap::updateOrCreate([
                'map_name' => $request->map_name
            ],
                [
                    'map_name' =>  $request->map_name,
                ]
            );

            return response()->json([
                'success' => true,
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }catch(\Exception $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStructure( Request $request ){

        try {

            $allRoles = array();

            $allMaps = AppMap::get();

            //  ------------------ PARENT GROUP
            foreach ( $allMaps as $map ){

                $roleGroup = array();
                $roleGroup['map_id']   = $map->map_id;
                $roleGroup['Head_ID']   = -1;
                $roleGroup['map_name'] = $map->map_name;

                array_push($allRoles, $roleGroup);

            }

            $collSort = collect($allRoles);

            return response()->json([
                'success'    => true,
                'structure'  => $collSort->sortBy('map_name', SORT_NATURAL)->values()->all()
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'sec_user_id' => auth('sanctum')->user()->sec_user_id,
                'email'     => auth('sanctum')->user()->email,
                'url ' => $request->fullUrl(),
                'error' => $e->getMessage()
            ), 'API_ENDPOINT_ERROR'));

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event(new EventHistory(array(
                'sec_user_id' => auth('sanctum')->user()->sec_user_id,
                'email'     => auth('sanctum')->user()->email,
                'url ' => $request->fullUrl(),
                'error' => $e->getMessage()
            ), 'API_ENDPOINT_ERROR'));

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }

    }

}
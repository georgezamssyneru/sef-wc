<?php

namespace Hip\PackageMapManagement\Http\Controllers;

use App\Events\EventHistory;
use App\Http\Controllers\Controller;
use App\Models\AppClass;
use App\Models\AppGridAttributes;
use App\Models\AppMapGeoType;
use App\Models\AppMapLayer;
use App\Models\AppMapLink;
use App\Models\AppVersion;
use App\Models\SecPermission;
use App\Models\SecRoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
use Enforcer;

class MapLayerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        //  --------------------
        //  --------------------    SORTING
        //  --------------------
        $sorting = '';

        if ( $request->get('sort')  ) {

            $convertToArraySort = json_decode($request->get('sort'));

            foreach ($convertToArraySort as &$v) {

                $check = ($v->desc) ? 'DESC' : 'ASC';

                $concat = $v->selector . ' ' . $check;

                if ($sorting == '') {
                    $sorting .= $concat;
                } else {
                    $sorting .= ',' . $concat;
                }

            }

        }

        //  --------------------
        //  --------------------    FILTERS, default always has the facility name  not being null
        //  --------------------
        $filters = array();

        if ($request->get('filter')) {

            $convertToArray = json_decode($request->get('filter'));

            foreach ($convertToArray as &$value) {

                if (is_array($value)) {

                    if ($value != 'and') {

                        if(is_string($value[0])){

                            switch ($value[1]) {
                                case 'contains':
                                    array_push($filters, [
                                        $value[0], 'ILIKE', '%' . $value[2] . '%'
                                    ]);
                                    break;
                                case '=':

                                    if(!Str::isUuid($value[2])){
                                        array_push($filters, [
                                            $value[0], '=', $value[2]
                                        ]);
                                    }
                                    break;
                                default:

                            }

                        }

                    }

                } else {

                    if ($value != 'and' ) {

                        if(is_string($value[0])){

                            switch ($convertToArray[1]) {
                                case 'contains':
                                    array_push($filters, [
                                        $convertToArray[0], 'ILIKE', '%' . $convertToArray[2] . '%'
                                    ]);
                                    break;
                                case '=':
                                    if(!Str::isUuid($convertToArray[2])){
                                        array_push($filters, [
                                            $convertToArray[0], '=', $convertToArray[2]
                                        ]);
                                    }
                                    break;

                            }

                        }

                    }

                }

            }

        };

        $getAppAttribute = AppMapLayer::when($sorting, function ($query) use ($sorting) {

            if ($sorting != '') {
                return $query->orderByRaw($sorting);
            }

        });

        $getAppAttribute = $getAppAttribute
            ->where($filters)
            // ->whereIn('permission_id',
            //     DB::table('sec_permission_link')
            //         ->where( 'role_id', '=', $request->role_id )
            //         ->pluck('permission_id')
            // )
            ->orderBy('layer_name', 'DESC')
            ->skip($request->skip)
            ->take($request->take)
            ->get();

        return response()->json([
            'success'       => true,
            'data'          => $getAppAttribute,
            'totalCount'    => $getAppAttribute->count(),
            'summary'       => [],
            'groupCount'    => [],
            'orderBy'       => $sorting
        ]);

    }

    //  --------------------
    //  --------------------    CREATE
    //  --------------------
    public function create(Request $request)
    {

        return response()->json([
            'success' => true
        ]);

    }

    //  --------------------
    //  --------------------    STORE
    //  --------------------
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'layer_name' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        try {

            $getRequst = $request->all();

            // $getRequst['permission_id'] = Str::uuid()->toString();

            //  CREATE THE CLASS
            AppMapLayer::create( $request->all() );

            //Artisan::call('appSyncSecCacheWithSecPermissionAll:run', []);

            return response()->json([
                'success' => true
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

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request){

        try {

            if (!$id)
                return response()->json([
                    'success' => false,
                    'message' => 'No App class chosen.'
                ]);

            $getRequest = $request->all();
            // $getRequest['sec_user_id'] = auth('sanctum')->user()->sec_user_id;

            //Determine the controller that must be run
            $getFacility = AppMapLayer::find( $id );
            $getFacility->update($getRequest);
            $getFacility->save();

            return response()->json([
                'success' => true
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ]);

        }catch(\Exception $e){

            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ]);

        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, Request $request)
    {

        try {

            //  ------- DELETE APP MAP LINK
            AppMapLink::where([
                ['map_layer_id', '=', $id ],
                // ['map_id', '=', $request->map_id ],
            ])->first()->delete();

            AppMapLayer::where('map_layer_id', $id )->delete();

            return response()->json([
                'success' => true
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'sec_user_id' => auth('sanctum')->user()->sec_user_id,
                'email'     => auth('sanctum')->user()->email,
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
                'error' => $e->getMessage()
            ), 'API_ENDPOINT_ERROR'));

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }
    }

    public function getAppMapGeoType(Request $request){
        try {

            return response()->json([
                'success' => true,
                'data' => AppMapGeoType::get()
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'sec_user_id' => auth('sanctum')->user()->sec_user_id,
                'email'     => auth('sanctum')->user()->email,
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
                'error' => $e->getMessage()
            ), 'API_ENDPOINT_ERROR'));

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }
    }

}
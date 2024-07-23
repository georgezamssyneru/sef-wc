<?php

namespace Hip\PackageReportingManagment\Http\Controllers;

use App\Events\EventHistory;
use App\Http\Controllers\Controller;
use App\Models\AppClass;
use App\Models\AppGridAttributes;
use App\Models\AppVersion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
use Enforcer;

class AppVersionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        try{

            //  --------------------
            //  --------------------    SORTING
            //  --------------------
            $sorting = '';

            if ($request->get('sort')) {

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

            $getAppAttribute = AppVersion::when($sorting, function ($query) use ($sorting) {

                if ($sorting != '') {
                    return $query->orderByRaw($sorting);
                }

            });

            $getAppAttribute = $getAppAttribute->skip($request->skip)
                ->where( $filters )
                ->orderBy('version_no', 'DESC')
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

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);

        }

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

        try{

            $validator = Validator::make($request->all(),[
                'version_no' => 'required'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());
            }

            try {

                //  CREATE THE CLASS
                AppVersion::create( $request->all() );

                return response()->json([
                    'success' => true
                ]);

            }catch (\Illuminate\Database\QueryException $e) {

                return response()->json([
                    'success' => false
                ]);

            }catch(\Exception $e){

                return response()->json([
                    'success' => false
                ]);

            }

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
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
            $getRequest['sec_user_id'] = auth('sanctum')->user()->sec_user_id;

            //Determine the controller that must be run
            $getFacility = AppVersion::find( $id );
            $getFacility->update($getRequest);
            $getFacility->save();

            return response()->json([
                'success' => true
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

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
    public function destroy($id)
    {

        try {

            //  ------------    DELETE THE APP GRID ATTRIBUTES
            AppVersion::where('app_version_id', $id)->delete();

            return response()->json([
                'success' => true
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'success' => false
            ]);

        }catch(\Exception $e){

            return response()->json([
                'success' => false
            ]);

        }

    }

}
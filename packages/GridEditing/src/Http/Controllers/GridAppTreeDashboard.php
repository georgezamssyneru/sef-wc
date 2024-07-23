<?php

namespace Hip\GridEditing\Http\Controllers;

use App\Events\EventHistory;
use App\Http\Controllers\Controller;
use App\Models\AppClass;
use App\Models\AppDashboard;
use App\Models\AppGrid;
use App\Models\AppGridAttributes;
use App\Models\AppTreeNode;
use App\Models\AppTreeNodeContent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
use Enforcer;

class GridAppTreeDashboard extends Controller
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

                        if(is_string($convertToArray[0])){

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

            };

            $getAppGrid = AppDashboard::when($sorting, function ($query) use ($sorting) {

                if ($sorting != '') {
                    return $query->orderByRaw($sorting);
                }

            })
                ->with('appTreeNodeContent')
                ->where($filters)
                ->whereIn('dashboard_id',
                    AppTreeNodeContent::select('content_id')
                        ->where('tree_node_id', $request->tree_node_id)
                        ->get()
                        ->toArray() );

            $getCount = $getAppGrid->count();

            $getAppGrid = $getAppGrid->skip($request->skip)
                ->take($request->take)
                ->get();

            return response()->json([
                'success'       => true,
                'data'          => $getAppGrid,
                'totalCount'    => $getCount,
                'summary'       => [],
                'groupCount'    => [],
                'orderBy'       => $sorting
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

        } catch (\Exception $e) {

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

        } catch (\Throwable $e) {

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

        try {

            $validator = Validator::make($request->all(),[
                'dash_name' => 'required'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());
            }

            $tree_node_id = $request->tree_node_id;

            $request->request->remove('tree_node_id');

            //  CREATE THE CLASS
            $createDashboard = AppDashboard::create( $request->all() );

            AppTreeNodeContent::create([
                'content_id' => $createDashboard->dashboard_id,
                'content_type_id'   => 5,
                'tree_node_id'      => $tree_node_id,
                'sort_order'        => $request->sort_order,
            ]);

            return response()->json([
                'success' => true,
                'createDashboard' => $createDashboard
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'email' => auth('sanctum')->user()->sec_user_id,
                'url ' => $request->fullUrl(),
                'error' => $e->getMessage()
            ), 'API_ENDPOINT_ERROR'));

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'email' => auth('sanctum')->user()->sec_user_id,
                'url ' => $request->fullUrl(),
                'error' => $e->getMessage()
            ), 'API_ENDPOINT_ERROR'));

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        } catch (\Throwable $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'email' => auth('sanctum')->user()->sec_user_id,
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
                    'message' => 'No data.'
                ]);


            $getRequest = $request->all();

            //$getRequest['sec_user_id'] = auth('sanctum')->user()->sec_user_id;

            //Determine the controller that must be run
            $getFacility = AppDashboard::where( 'dashboard_id', $id )->first();
            $getFacility->update($getRequest);
            $getFacility->save();

            return response()->json([
                'success' => true
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'email' => auth('sanctum')->user()->sec_user_id,
                'url ' => $request->fullUrl(),
                'error' => $e->getMessage()
            ), 'API_ENDPOINT_ERROR'));

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'email' => auth('sanctum')->user()->sec_user_id,
                'url ' => $request->fullUrl(),
                'error' => $e->getMessage()
            ), 'API_ENDPOINT_ERROR'));

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        } catch (\Throwable $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'email' => auth('sanctum')->user()->sec_user_id,
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        try {

            //  ------------    DELETE THE APP GRID ATTRIBUTES
            AppTreeNodeContent::where('content_id', $id )->delete();

            //  ------------    DELETE THE APP GRID
            $getGrid = AppDashboard::find($id);

            $getGrid->delete();

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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadDashboardImage( Request $request ){

        try {

            $str = file_get_contents($_FILES["files"]["tmp_name"][0]);

            AppTreeNodeContent::where('content_id', $request->dashboard_id )->update([
                'thumbnail' => base64_encode($str)
            ]);

            return response()->json([
                'success' => true
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'email' => auth('sanctum')->user()->sec_user_id,
                'url ' => $request->fullUrl(),
                'error' => $e->getMessage()
            ), 'API_ENDPOINT_ERROR'));

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'email' => auth('sanctum')->user()->sec_user_id,
                'url ' => $request->fullUrl(),
                'error' => $e->getMessage()
            ), 'API_ENDPOINT_ERROR'));

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        } catch (\Throwable $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'email' => auth('sanctum')->user()->sec_user_id,
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
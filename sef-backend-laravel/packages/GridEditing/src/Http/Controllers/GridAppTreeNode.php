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

class GridAppTreeNode extends Controller
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

            $getAppGrid = AppTreeNode::when($sorting, function ($query) use ($sorting) {

                if ($sorting != '') {
                    return $query->orderByRaw($sorting);
                }

            })
                ->where($filters)
                ->where('tree_id', env('APP_TREE_ID_DASHBOARDS'));

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
                'node_name' => 'required'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());
            }

            //  ------------------------    DASHBOARD
            $request['tree_id'] = '3d536b4f-2c8c-4953-b3bd-28a3e70b8a04';

            //  CREATE THE CLASS
            AppTreeNode::create( $request->all() );

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

        }catch (\Exception $e) {

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
                    'message' => 'No tree node id.'
                ]);

            $getRequest = $request->all();
            //$getRequest['sec_user_id'] = auth('sanctum')->user()->sec_user_id;

            //Determine the controller that must be run
            $getFacility = AppTreeNode::where( 'tree_node_id', $id )->first();
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

            //  ------------    DELETE THE APP GRID
            $getGrid = AppTreeNode::where('tree_node_id', $id)->first();

            $AppTreeNodeContent = AppTreeNodeContent::where('tree_node_id', $getGrid->tree_node_id );

            //  ----------------    DELETE ALL DASHBOARD
            foreach ($AppTreeNodeContent->get() as &$v) {

                AppDashboard::where('dashboard_id', $v->content_id)->delete();

                AppTreeNodeContent::find($v->tree_node_content_id)->delete();

            }

            $getGrid->delete();

            return response()->json([
                'success' => true,
                'data'   => $AppTreeNodeContent->get()
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event(new EventHistory(array(
                'email' => auth('sanctum')->user()->sec_user_id,
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
                'error' => $e->getMessage()
            ), 'API_ENDPOINT_ERROR'));

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

    }

}
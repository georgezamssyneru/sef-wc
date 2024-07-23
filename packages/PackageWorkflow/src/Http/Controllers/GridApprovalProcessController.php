<?php

namespace Hip\Workflow\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\AppGridAttributes;
use App\Models\AppReport;
use App\Models\AppWfInstance;
use App\Models\MasterData\FormGenerator\AppForm;
use App\Models\MasterData\FormGenerator\AppFormAttributes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
use Enforcer;

class GridApprovalProcessController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        try {

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

            $getAppForm = AppWfInstance::when($sorting, function ($query) use ($sorting) {

                if ($sorting != '') {
                    return $query->orderByRaw($sorting);
                }

            })
                ->where($filters)
                ->where('status_id', '=',3);

            $getCount = $getAppForm->count();

            $getAppForm = $getAppForm->skip($request->skip)
                ->take($request->take)
                ->with('appWfInstanceState.appWfData.appClass')
                ->get();

            return response()->json([
                'success'       => true,
                'data'          => $getAppForm,
                'totalCount'    => $getCount,
                'summary'       => [],
                'groupCount'    => [],
                'orderBy'       => $sorting
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

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function workflowTest(Request $request)
    {

        return response()->json([
            'success' => true
        ]);

    }

}
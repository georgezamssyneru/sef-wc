<?php

namespace Hip\PackageRoleManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AppClass;
use App\Models\AppGridAttributes;
use App\Models\AppVersion;
use App\Models\SecRoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
use Enforcer;

class UserRoleController extends Controller
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

        $getAppAttribute = User::when($sorting, function ($query) use ($sorting) {

            if ($sorting != '') {
                return $query->orderByRaw($sorting);
            }

        });

        $getAppAttribute = $getAppAttribute
            ->where($filters)
            ->whereIn('sec_user_id',
                DB::table('sec_role_user')
                    ->where( 'role_id', '=', $request->role_id )
                    ->pluck('user_id')
            )
            ->where('user_status_id', 2)
            ->orderBy('last_name', 'Asc')
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
            'success' => true,
            'data'    => 'disabled'
        ]);

    }

    //  --------------------
    //  --------------------    STORE
    //  --------------------
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
    }

}
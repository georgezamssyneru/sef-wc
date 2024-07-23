<?php

namespace Hip\Workflow\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AppClass;
use App\Models\AppWfStatus;
use App\Models\MasterData\FormGenerator\AppForm;
use App\Models\SecRoleUser;
use Carbon\Carbon;
use Hip\CustomAuth\Http\Controllers\AuthController;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlanningController extends Controller
{


    public function __construct( )
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllInfrastrucurePlanners(Request $request){

        try {

            return response()->json([
                'success' => true,
                'data' => SecRoleUser::where('role_id', '69480e73-2a6a-4c51-bcaf-a264833586d6')->with('user')->get()
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
    public function getAllStrategicPlanners(Request $request){

        try {

            return response()->json([
                'success' => true,
                'data' => SecRoleUser::where('role_id', 'd8b742fe-2ca8-4e47-99c9-09a8d64e8d48')->with('user')->get()
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

}
<?php
namespace Hip\PackageMapManagement\Http\Controllers;

use App\Events\EventHistory;
use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
use App\Models\AppMap;
use App\Models\AppMapLink;
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


class AppMapLinkController extends Controller
{

    use PermissionSec;

    // Display a list of all items
    public function index(Request $request)
    {
        
        try {

            return response()->json([
                'success'    => true,
                'data'  =>  AppMapLink::where([
                    ['map_id', '=', $request->map_id ]
                ])->get()
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

    // Show the form for creating a new item
    public function create(Request $request)
    {
        
    }

    // Store a newly created item in storage
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'map_id' => 'required',
            'map_layer_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        try {
           
            //  CREATE THE CLASS
            AppMapLink::create( $request->all() );

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
                'message' => $e->getMessage()
            ]);

        }
    }

    // Display the specified item
    public function show(Request $request)
    {
        
    }

    // Show the form for editing the specified item
    public function edit(Request $request)
    {
        
    }

    // Update the specified item in storage
    public function update(Request $request)
    {
        
    }

    // Remove the specified item from storage
    public function destroy($id, Request $request)
    {
        try{

            $row = AppMapLink::where([
                ['map_id', '=', $id ],
                ['map_layer_id', '=', $request->map_layer_id ]
            ])->first();

            $row->delete();

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
                'message' => $e->getMessage()
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
                'message' => $e->getMessage()
            ]);

        }
    }

}
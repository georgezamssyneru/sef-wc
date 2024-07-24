<?php

use App\Models\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Hip\PackageUserManagement\Http\Controllers\PackageUserController;
use Hip\PackageUserManagement\Http\Controllers\SecUsersController;

//Route::get('api/encrypt', [ PackageUserController::class, 'encrypt' ]);
//Route::post('api/decrypt', [ PackageUserController::class, 'decrypt' ]);

//Route::post('api/createPublicPrivateKeys', [ PackageUserController::class, 'createPublicPrivateKeys' ]);
Route::get('/api/oracle', function () {

    return response()->json([
        'success' => true,
        //'error'   => App::get()
    ]);

});

Route::group(['middleware' => ['auth:sanctum']], function () {

    //  GET ALL DISTRICTS
    Route::post('api/getDistricts', [ PackageUserController::class, 'getDistricts' ]);

    //  GET ALL FACILITIES BY DISTRICT
    Route::post('api/getFacilities', [ PackageUserController::class, 'getFacilities' ]);

    // --------    GET USER STATUS
    Route::get('api/getUserStatus', [ PackageUserController::class, 'getUserStatus' ]);

});

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum', 'ensureAdmin']], function () {

    /**
     *  USERS WITH NO ROLES OR NOT BEEN VERIFIED
     */
    Route::get('api/users/usersWithRoles', [ PackageUserController::class, 'usersWithRoles' ]);

    Route::get('api/users/usersSearch', [ PackageUserController::class, 'usersSearchWithRoles' ]);

    // --------    ASSIGN ROLE
    Route::get('api/assignRole', [ PackageUserController::class, 'assign' ]);

    // --------    ASSIGN USER STATUS, INACTIVE ACTIVE ETC
    Route::post('api/assignUserStatus', [ PackageUserController::class, 'assignUserStatus' ]);

    // --------    GET ROLES
    Route::get('api/users/getRoles', [ PackageUserController::class, 'getRoles' ]);

    Route::resource('api/getSecUsers', SecUsersController::class );

});
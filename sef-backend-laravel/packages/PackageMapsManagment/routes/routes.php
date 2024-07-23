<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Hip\PackageMapsManagment\Http\Controllers\PackageMapsController;

Route::group(['middleware' => ['auth:sanctum']], function (){

    Route::post('api/esri/getFacilitiesFromPolygon', [ PackageMapsController::class, 'getFacilitiesFromPolygon' ]);

    Route::get('api/esri/serviceAreas', [ PackageMapsController::class, 'getServiceAreas' ]);

    Route::get('api/esri/serviceAreasFacilityQuery', [ PackageMapsController::class, 'getServiceAreasQueryFacilities' ]);

    Route::post('api/map/makeComment', [ PackageMapsController::class, 'makeComment' ]);

    Route::post('api/map/makeCommentMap', [ PackageMapsController::class, 'makeComment' ]);

    Route::get('api/map/getFacilityWithMeta', [ PackageMapsController::class, 'getFacilityWithMeta' ]);

    Route::get('api/map/getFacilityByID', [ PackageMapsController::class, 'getFacilityByID' ]);

    Route::get('api/map/filterProject', [ PackageMapsController::class, 'filterProject' ]);

    Route::get('api/map/getComments', [ PackageMapsController::class, 'getComments' ]);

    Route::get('api/map/dashboards', [ PackageMapsController::class, 'getDashboards' ]);
});

/**
 *  ----------------    FACILITY EDITOR ROLE
 */
Route::group(['middleware' => ['auth:sanctum', 'ensureFacilityEditor']], function () {

    Route::post('api/map/updateFacility', [ PackageMapsController::class, 'updateFacility' ]);

    Route::post('api/map/updateBeds', [ PackageMapsController::class, 'updateBeds' ]);

});
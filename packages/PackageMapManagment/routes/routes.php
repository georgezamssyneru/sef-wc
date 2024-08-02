<?php

use App\Models\dbo\DimRoad;
use Hip\GridEditing\Http\Controllers\GridEditingController;
use Hip\PackageMapManagement\Http\Controllers\AppMapLinkController;
use Hip\PackageMapManagement\Http\Controllers\AppMapLinkDevExtremeGrid;
use Hip\PackageMapManagement\Http\Controllers\AppMapStyleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Hip\PackageMapManagement\Http\Controllers\PackageMapController;
use Hip\PackageMapManagement\Http\Controllers\PackageMapsController;
use Hip\PackageMapManagement\Http\Controllers\UserRoleController;
use Hip\PackageMapManagement\Http\Controllers\MapLayerController;

Route::get('/api/dimtest', function () {
    // SQL query using INFORMATION_SCHEMA
    $query = "
        SELECT COLUMN_NAME, DATA_TYPE
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_NAME = ?
    ";

    // Execute the query
    $columns = DB::connection('oracleSpatial')->select($query, ['DIM_Road']);

    return response()->json($columns);
    
});

//Protecting Routes
Route::group(['middleware' => [ 'auth:sanctum', 'ensureAdmin' ]], function () {

    Route::resource('api/map/getAppMapLink', AppMapLinkController::class );

    Route::resource('api/map/AppMapLinkGrid', AppMapLinkDevExtremeGrid::class );

    Route::resource('api/map/mapStyles', AppMapStyleController::class );

    Route::get('api/map/getAppMapStyles', [ AppMapStyleController::class, 'getAppMapStyles' ]);

    Route::get('api/map/getAppMapGeoType', [ MapLayerController::class, 'getAppMapGeoType' ]);

    Route::get('api/getAllClasses', [ GridEditingController::class, 'getAllClasses' ]);

    Route::resource('api/map/mapLayers', MapLayerController::class );

    Route::get('api/map/getMapLayers', [MapLayerController::class, 'getMapLayers' ]);

    Route::get('api/map/tree', [ PackageMapsController::class, 'getStructure' ]);

    Route::get('api/map/tree/{map_id}', [ PackageMapsController::class, 'removeMap' ]);

    Route::post('api/map/create', [ PackageMapsController::class, 'createMap' ]);

});
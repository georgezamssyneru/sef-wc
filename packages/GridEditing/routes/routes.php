<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Hip\GridEditing\Http\Controllers\GridEditingController;
use Hip\GridEditing\Http\Controllers\GridFacilityRequestByUserController;
use Hip\GridEditing\Http\Controllers\GridFacilityController;
use Hip\GridEditing\Http\Controllers\GridAppClassController;
use Hip\GridEditing\Http\Controllers\GridAppClassAttributeController;
use Hip\GridEditing\Http\Controllers\GridAppGridController;
use Hip\GridEditing\Http\Controllers\GridAppFormController;
use Hip\GridEditing\Http\Controllers\GridAppFormAttributesController;
use Hip\GridEditing\Http\Controllers\GridAppGridAttributesController;
use Hip\GridEditing\Http\Controllers\GridScenarioPlanningController;
use Hip\GridEditing\Http\Controllers\GridScenarioFacilityStageController;
use Hip\GridEditing\Http\Controllers\GridAppTreeNode;
use Hip\GridEditing\Http\Controllers\GridAppTreeDashboard;

//  --------------
//  --------------  USER LOGGED IN
//  --------------
Route::group(['middleware' => ['auth:sanctum']], function () {

    //    APP CLASS
    Route::get('api/getGridAppClass', [GridEditingController::class, 'getGridAppClass']);

    Route::get('api/getDataSources', [GridEditingController::class, 'getDataSources']);

    Route::get('api/getAllClasses', [ GridEditingController::class, 'getAllClasses' ]);

    Route::get('api/getGridAttributeFromClassAttribute', [ GridEditingController::class, 'getGridAttributeFromClassAttribute' ]);

    Route::get('api/getGridTypeEditing', [ GridEditingController::class, 'getGridTypeEditing' ]);

    Route::get('api/gridEditing/test', [ GridEditingController::class, 'gridTest' ]);

    Route::get('api/getAllMetaDataTypesFromLookups', [ GridEditingController::class, 'getAllMetaDataTypesFromLookups' ]);

    Route::get('api/data/getFacilityType', [ GridEditingController::class, 'getFacilityType' ]);

    Route::get('api/data/getMunicipalities', [ GridEditingController::class, 'getMunicipalities' ]);

    Route::get('api/gridItems', [ GridEditingController::class, 'getGridItems' ]);

    Route::get('api/gridItems/beds', [ GridEditingController::class, 'getGridItemsBeds' ]);

    Route::get('api/gridItems/maintenance', [ GridEditingController::class, 'getGridItemsMaintenance' ]);

    Route::get('api/gridAttributes', [ GridEditingController::class, 'getGridAttributes' ]);

    Route::resource('api/gridEditing', GridEditingController::class);

    Route::resource('api/gridFacilityRequestByUser', GridFacilityRequestByUserController::class);

    Route::resource('api/gridFacility', GridFacilityController::class);

    //  -----------------   CREATE SCENARIO (ALLOW TO VIEW AND EDIT)
    Route::resource('api/gridScenarioFacilityStage', GridScenarioFacilityStageController::class);

});

//  --------------
//  --------------  FACILITY EDITOR ROLE
//  --------------
Route::group(['middleware' => ['auth:sanctum', 'ensureFacilityEditor']], function () {

    Route::post('api/data/updateFacilityCoordinates', [ GridEditingController::class, 'updateFacilityCoordinates' ]);

});

//  --------------
//  --------------  INFRASTRUCTURE PLANNER ROLE
//  --------------
Route::group(['middleware' => ['auth:sanctum', 'ensureIsInfrastructurePlannerAndStrategicPlanner' ]], function () {

    Route::resource('api/gridScenario', GridScenarioPlanningController::class);

    Route::get('api/getScenario', [ GridScenarioPlanningController::class, 'getScenario' ]);

    Route::get('api/getScenarioPlain', [ GridScenarioPlanningController::class, 'getScenarioPlain' ]);

});

//  --------------
//  --------------  ADMIN ROLE
//  --------------
Route::group(['middleware' => ['auth:sanctum', 'ensureAdmin']], function () {

    //    APP CLASS
    Route::resource('api/gridAppClassEditing', GridAppClassController::class );

    Route::resource('api/gridAppClassAttribute', GridAppClassAttributeController::class );

    //    APP GRID
    Route::resource('api/gridAppGrid', GridAppGridController::class );

    Route::resource('api/gridAppGridAttribute', GridAppGridAttributesController::class );

    //    FORM GRID
    Route::resource('api/gridAppForm', GridAppFormController::class );

    Route::resource('api/gridAppFormAttribute', GridAppFormAttributesController::class );

    //    APP GRID TREE DASHBOARD
    Route::resource('api/gridAppTreeNode', GridAppTreeNode::class );

    Route::resource('api/gridAppTreeDashboard', GridAppTreeDashboard::class );

    //     UPLOAD IMAGE DASHBOARD
    Route::post('api/uploadDashboardImage', [ GridAppTreeDashboard::class, 'uploadDashboardImage' ]);

});
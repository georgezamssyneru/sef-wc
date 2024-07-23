<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Hip\FormGenerator\Http\Controllers\FormGeneratorController;

Route::get('api/formGenerator/test', [ FormGeneratorController::class, 'test' ]);

Route::get('api/formGenerator/generateToken', [ FormGeneratorController::class, 'generateToken' ]);

//  --------------
//  --------------  NORMAL AUTH
//  --------------
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('api/formGenerator/getGeomFromLatLong', [ FormGeneratorController::class, 'getGeomFromLatLong' ]);

    Route::get('api/formGenerator/getClassAttributesMetaData', [ FormGeneratorController::class, 'getClassAttributesMetaData' ]);

    //  ----------  SAVE DYNAMIC FORM DATA
    Route::post('api/formGenerator/saveData', [ FormGeneratorController::class, 'storeData' ]);

    Route::get('api/formGenerator/getFacilityRequestById', [ FormGeneratorController::class, 'getFacilityRequestById' ]);

    Route::get('api/formGenerator/getScenarioWfById', [ FormGeneratorController::class, 'getScenarioWfById' ]);

    Route::get('api/formGenerator/getFacilityById', [ FormGeneratorController::class, 'getFacilityById' ]);

    //  ----------  GET FORM AND RELATIONSHIPS
    Route::get('api/formGenerator/getForm', [ FormGeneratorController::class, 'getForm' ]);

    //  ----------  GET FORM DATA WITH SELECTED KEY
    Route::get('api/formGenerator/getFormDataByKey', [ FormGeneratorController::class, 'getFormDataByKey' ]);

    //  ----------  GET ALL FORMS
    Route::get('api/formGenerator/getAllForms', [ FormGeneratorController::class, 'getAllForms' ]);

});

//  --------------
//  --------------  ENSURE IS PLANNER
//  --------------
Route::group(['middleware' => ['auth:sanctum', 'ensureIsPlanner']], function () {

    //  ----------  REGIONAL APPROVAL PLANNER -> INFRASTRUCTURE PLANNER
    Route::post('api/formGenerator/approvalData', [ FormGeneratorController::class, 'approvalData' ]);

});

//  --------------
//  --------------  ENSURE IS INFRASTRUCTURE PLANNER
//  --------------
Route::group(['middleware' => ['auth:sanctum', 'ensureIsInfrastructurePlannerAndStrategicPlanner']], function () {

   //  ----------  REGIONAL APPROVAL PLANNER -> INFRASRYCTURE PLANNER
    Route::post('api/formGenerator/approvalInfrastructurePlannerData', [ FormGeneratorController::class, 'approvalInfrastructurePlannerData' ]);

});
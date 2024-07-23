<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Hip\Workflow\Http\Controllers\WorkflowController;
use \Hip\Workflow\Http\Controllers\PlanningController;
use \Hip\Workflow\Http\Controllers\GridApprovalProcessController;

Route::get('api/workflow/test', [ WorkflowController::class, 'workflowTest']);

//  --------------  CREATE SUPERSET IMAGE
Route::get('api/workflow/createSupersetChartImages',  [ WorkflowController::class, 'runSuperSetChartImage' ] );

Route::group(['middleware' => ['auth:sanctum']], function () {

    //  --------------  WORKFLOW INSTANCE
    //Route::resource('api/workflow/workflowInstance', GridApprovalProcessController::class);

    Route::post('api/workflow/workflowInstance',  [GridApprovalProcessController::class, 'index'] );

    //  --------------  GET STATUS
    Route::get('api/workflow/getWorkflowStatus',  [WorkflowController::class, 'getWorkflowStatus'] );

    //  --------------  WORKFLOW PROCESS
    Route::post('api/workflow/workflowProgress',  [WorkflowController::class, 'workflowProgress'] );

    //  Route::post('api/workflow/initiateWorkflow', [ WorkflowController::class, 'initiateWorkflow' ]);

});

Route::group(['middleware' => ['auth:sanctum', 'ensureIsPlanner' ]], function () {

    //  --------------  GET PLANNERS BY
    Route::get('api/planner/getAllInfrastrucurePlanners',  [PlanningController::class, 'getAllInfrastrucurePlanners'] );

});

Route::group(['middleware' => ['auth:sanctum', 'ensureIsInfrastructurePlannerAndStrategicPlanner' ]], function () {

    //  --------------  GET PLANNERS BY
    Route::get('api/planner/getAllStrategicPlanners',  [PlanningController::class, 'getAllStrategicPlanners'] );

});
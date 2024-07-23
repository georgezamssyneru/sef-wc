<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Hip\PackageTree\Http\Controllers\TreeController;

Route::get('api/tree/test', [ TreeController::class, 'treeTest']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('api/tree/getTreeView', [ TreeController::class, 'getTreeView']);

});

Route::group(['middleware' => ['auth:sanctum', 'ensureIsInfrastructurePlannerAndStrategicPlanner' ]], function () {


});
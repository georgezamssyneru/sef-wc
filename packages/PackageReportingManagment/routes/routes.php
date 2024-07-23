<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Hip\PackageReportingManagment\Http\Controllers\PackageReportingController;
use Hip\PackageReportingManagment\Http\Controllers\GridPackageReporting;
use Hip\PackageReportingManagment\Http\Controllers\AppVersionController;
use Hip\PackageReportingManagment\Http\Controllers\BackupController;

Route::get('api/reporting/test', [ PackageReportingController::class, 'reportingTest' ]);

Route::get('api/reportingDevExpressReporting', [ PackageReportingController::class, 'reportingDevExpress' ]);

//  -----------------   MIDDLEWARE AUTH AND ENSURE ADMIN
Route::group(['middleware' => ['auth:sanctum', 'ensureAdmin']], function () {

    //  ----------------    REPORTING
    Route::get('api/reporting/providersReportingDatePicker', [ PackageReportingController::class, 'providersReportingDatePicker' ]);

    Route::get('api/reporting/getImportEntity', [ PackageReportingController::class, 'importEntity' ]);

    Route::get('api/reporting/getImportDetail', [ PackageReportingController::class, 'importDetail' ]);

    Route::get('api/reporting/getImportFacility', [ PackageReportingController::class, 'importFacility' ]);

    Route::get('api/reporting/getImportDetailCSIR', [ PackageReportingController::class, 'importDetailCSIR' ]);

    Route::post('api/reporting', [ PackageReportingController::class, 'reporting' ]);

    Route::post('api/reporting/providers', [ PackageReportingController::class, 'providersReporting' ]);

    Route::resource('api/reporting/version', AppVersionController::class );

    Route::resource('api/reporting/backup', BackupController::class );

    Route::resource('api/gridReporting', GridPackageReporting::class);

    //  -----------------   GET ALL REPORT LAYOUT
    Route::get('api/reportLayout', [ PackageReportingController::class, 'reportLayout' ]);

});

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('api/reporting/layout', [ PackageReportingController::class, 'reportingLayout' ]);

});
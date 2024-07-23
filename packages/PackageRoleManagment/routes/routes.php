<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Hip\PackageRoleManagement\Http\Controllers\PackageRolesController;
use Hip\PackageRoleManagement\Http\Controllers\UserRoleController;
use Hip\PackageRoleManagement\Http\Controllers\RolePermissionController;

//Protecting Routes
Route::group(['middleware' => [ 'auth:sanctum', 'ensureAdmin' ]], function () {

    /**  GET ROLE TYPES  */
    Route::get('api/roles/getRoleTypes', [ PackageRolesController::class, 'getRoleTypes' ]);

    /**  GET ALL ROLES  */
    Route::get('api/roles/getRoles', [ PackageRolesController::class, 'getRoles' ]);

    /**  GET USERS WITH ROLES  */
    Route::get('api/roles/getUsersWithRoles', [ PackageRolesController::class, 'getUsersWithRoles' ]);

    /**  GET ALL PERMISSIONS TO ROLES  */
    Route::get('api/roles/getPermissionsByRole', [ PackageRolesController::class, 'getPermissionsByRole' ]);

    /**  ASSIGN USER ROLES  */
    Route::post('api/roles/assignRoles', [ PackageRolesController::class, 'assignRoles' ]);

    /**  ASSIGN PERMISSION TO ROLE  */
    Route::post('api/roles/assignRoleToPermission', [ PackageRolesController::class, 'assignRoleToPermission' ]);

    /**  ASSIGN PERMISSION TO ROLE  */
    Route::post('api/roles/assignPermission', [ PackageRolesController::class, 'assignPermission' ]);

    /**  REVOKE USER ROLES  */
    Route::post('api/roles/revokeUserRole', [ PackageRolesController::class, 'revokeUserRole' ]);

    /**  REVOKE USER PERMISSION ON ROLE  */
    Route::post('api/roles/revokePermissionRole', [ PackageRolesController::class, 'revokePermissionRole' ]);

    /**  ADD USER TO ROLE  */
    Route::post('api/roles/assignUserRole', [ PackageRolesController::class, 'assignUserRole' ]);

    Route::post('api/roles/createRole', [ PackageRolesController::class, 'createRole' ]);

    Route::resource('api/roles/users', UserRoleController::class );

    Route::resource('api/roles/permissions', RolePermissionController::class );

    Route::get('api/roles/tree', [ PackageRolesController::class, 'getStructure' ]);

});
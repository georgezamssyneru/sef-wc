<?php

use App\Models\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Hip\CustomAuth\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('api/oracle', function () {
    return response([
        'success'   => true,
        'message'   => App::get()
    ]);
});

//  --------    REGISTER
Route::post('api/register', [ AuthController::class, 'register' ]);

//  --------    VERIFY EMAIL
Route::get('/email/verify/{id}/{hash}', function (Request $request) {

    $user = \App\Models\User::find($request->route('id'));

    if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
        throw new AuthorizationException;
    }

    if ($user->markEmailAsVerified()){
        event(new \Illuminate\Auth\Events\Verified($user));
        return redirect(env('REDIRECT_URL_APP').'?verified=1')->with('verified', true);
    }else{
        return redirect(env('REDIRECT_URL_APP').'?verified=0')->with('verified', true);
    }

})->name('verification.verify');

//Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//                ->middleware(['auth', 'signed', 'throttle:6,1'])
//                ->name('verification.verify');

// --------    FORGOT-PASSWORD
Route::post('api/forgot-password', [ AuthController::class, 'forgotPassword' ]);

// --------    RESET-PASSWORD
Route::post('api/reset-password', [ AuthController::class, 'reset' ]);

// --------    LOGIN
Route::post('api/login', [ AuthController::class, 'login' ]);

// --------    SAFE COMMUNICATION
Route::get('api/secure/encrypt', [ AuthController::class, 'encrypt' ]);

//  -------     GET ESRI DASHBOARD
Route::post('api/getSupersetGuestTokenForDashboardId', [ AuthController::class, 'getSupersetGuestTokenForDashboardId' ]);

// --------     PROTECTED ROUTES
Route::group(['middleware' => ['auth:sanctum']], function () {

    // --------     RESEND CONFIRMATION EMAIL
    Route::get('api/resendEmailConfirmation', [ AuthController::class, 'resendEmailConfirmation' ]);

    // --------    PROFILE
    Route::get('api/profile', [ AuthController::class, 'profile' ]);

    // --------    AUTHENTICATION TREE
    Route::get('api/tree', [ AuthController::class, 'authenticatedTreeComponents' ]);

    // --------    DASHBOARDS
    Route::get('api/componentInstance', [ AuthController::class, 'authenticatedComponentInstance' ]);

    // --------    RESET PASSWORD
    Route::post('api/resetPassword', [ AuthController::class, 'resetPassword']);

    // API route for logout user
    Route::post('api/logout', [ AuthController::class, 'logout']);

    // --------     SUPERSET ACCESS TOKEN
    Route::post('api/getSupersetGuestToken', [ AuthController::class, 'getSupersetGuestToken' ]);

    Route::post('api/getSupersetGuestTokenWithFilters', [ AuthController::class, 'getSupersetGuestTokenWithFilters' ]);

});

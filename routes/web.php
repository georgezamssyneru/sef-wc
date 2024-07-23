<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::post('/login', [ App\Http\Controllers\LoginController::class, 'authenticate' ]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('esri');
});

Auth::routes(['verify' => false]);

//  --------------  STORAGE ROUTE
Route::get('superset/{filename}', function ($filename)
{

    $path = storage_path('public/superset/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

//  --------------  STORAGE ROUTE UAMP
Route::get('uamp/{filename}', function ($filename)
{

    $path = storage_path('public/uamp/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
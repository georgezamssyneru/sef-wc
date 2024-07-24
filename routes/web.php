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
    return response('Test response');
});

Route::get('/session-test', function () {
    session(['test' => 'value']);
    return response('Session test');
});

Route::get('/test', function () {
    return view('esri');
});

Auth::routes(['verify' => false]);

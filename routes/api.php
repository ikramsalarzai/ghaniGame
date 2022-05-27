<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpinerController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('list', DeviceController::class);
Route::get('search/{name}', [DeviceController::class,'search']);


Route::post('login', [UserController::class, 'index']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('member', MemberController::class);
});


Route::resource('spinner', SpinerController::class);

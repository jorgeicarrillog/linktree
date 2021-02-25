<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->prefix('v1')->name('api.v1.')->group(function () {
    Route::apiResource('links', App\Http\Controllers\Api\LinkApiController::class);
    Route::apiResource('redes-sociales', App\Http\Controllers\Api\SocialNetworkApiController::class)->parameters(['redes-sociales' => 'socialNetwork']);
});
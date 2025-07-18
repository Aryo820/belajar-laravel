<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    $response = ['message' => 'API Sudah Berjalan'];
    return response()->json($response);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [App\Http\Controllers\API\ApiController::class, 'getUsers']);
    Route::get('me', [App\Http\Controllers\API\ApiController::class, 'me']);
});

Route::get('user/{id}', [App\Http\Controllers\API\ApiController::class, 'editUser']);
Route::post('user', [App\Http\Controllers\API\ApiController::class, 'storeUser']);
Route::put('user/{id}', [App\Http\Controllers\API\ApiController::class, 'updateUser']);
Route::delete('user/{id}', [App\Http\Controllers\API\ApiController::class, 'deleteUser']);
Route::post('login', [App\Http\Controllers\API\ApiController::class, 'loginAction']);

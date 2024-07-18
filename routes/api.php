<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProtectedController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('firebaseAuth')->group(function () {
    Route::get('/protected-data', [ProtectedController::class, 'getProtectedData']);
});

Route::middleware('firebaseAuth')->group(function () {
    Route::get('/protected-route', function () {
        return response()->json(['message' => 'This is a protected route']);
    });

    Route::get('/hola', function () {
        return response()->json(['message' => 'holaaaa22']);
    });

    // Otras rutas protegidas
    Route::get('person/create', [App\Http\Controllers\v1\Person\Create::class, 'create']);
});




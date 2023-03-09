<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SclassController;
use App\Http\Controllers\SubjectController;


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

Route::get('/class', [SclassController::class, 'index']);
Route::post('/class', [SclassController::class, 'store']);
Route::delete('/class/{class}', [SclassController::class, 'destroy']);
Route::get('/class/{class}', [SclassController::class, 'show']);
Route::patch('/class/{class}', [SclassController::class, 'update']);

Route::resource('/subject', SubjectController::class);


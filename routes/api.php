<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

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

Route::get(
    '/departments',
    [DepartmentController::class, 'index']
);
Route::post(
    '/departments',
    [DepartmentController::class, 'store']
);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
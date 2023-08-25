<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\AuthController;

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

// Register route and login route

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

/* Define the unprotected routes: get all departments, get a department by id

*/
Route::group(['middleware' => ['api']], function () {
    // get all departments from el_salvador database
    Route::get(
        'departments',
        [DepartmentController::class, 'index']
    );
    // get a department from el_salvador database
    Route::get(
        'departments/{id}',
        [DepartmentController::class, 'show']
    );
    // get by slug 
    Route::get(
    'departments/name/{slug}',
    [DepartmentController::class, 'showBySlug']
    );
    // Search route
    Route::get( 
    'departments/search/{name}',
    [DepartmentController::class, 'search']
    );
});


// Protected department routes with Sanctum

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Auth routes
    Route::post('logout', [AuthController::class, 'logout']);

    // create a department in el_salvador database
    Route::post(
        'departments',
        [DepartmentController::class, 'store']
    );
    // update a department in el_salvador database
    Route::put(
        'departments/{id}',
        [DepartmentController::class, 'update']
    );
    // delete a department in el_salvador database
    Route::delete(
        'departments/{id}',
        [DepartmentController::class, 'destroy']
    );
    // Municipalities protected routes
    Route::post(
        'municipalities',
        [MunicipalityController::class, 'store']
    );
     Route::put(
        'municipalities/{id}',
        [MunicipalityController::class, 'update']
    );
    Route::delete(
        'municipalities/{id}',
        [MunicipalityController::class, 'destroy']
    );

});



// Get the top-5 largest departments
Route::get('departments/area/top-five', [DepartmentController::class, 'topFive']);

/*
|--------------------------------------------------------------------------
| Municipality Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['api']], function () {
    // get all municipalities from el_salvador database
    Route::get(
        'municipalities',
        [MunicipalityController::class, 'index']
    );
    
    Route::get(
        'municipalities/{id}',
        [MunicipalityController::class, 'show']
    );
   
    Route::get(
        'municipalities/search/{name}',
        [MunicipalityController::class, 'search']
    );
    Route::get(
        'municipalities/top-five',
        [MunicipalityController::class, 'topFive']
    );
});






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
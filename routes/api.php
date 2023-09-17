<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ZonesController;
use App\Http\Controllers\DistrictController;

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
// Get the top-5 largest departments
Route::get('departments/area/top-five', [DepartmentController::class, 'topFive']);
// Show departments based on zone
Route::get('departments/zone/{id}', [DepartmentController::class, 'showByZone']);
// Most populated districts
Route::get('districts/population/top-ten', [DistrictController::class, 'topTenMostPopulated']);

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
    // get all zones from zones database
    Route::get(
        'zones',
        [ZonesController::class, 'index']
    );
    // get a zone from zones database
    Route::get(
        'zones/{id}',
        [ZonesController::class, 'show']
    );
    /*
    Municipalities routes
    */
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
    /*
    Districts routes
    */
    // get all districts from el_salvador database
    Route::get(
        'districts',
        [DistrictController::class, 'index']
    );
    // get a district from el_salvador database
    Route::get(
        'districts/{id}',
        [DistrictController::class, 'show']
    );
    // get top ten most populated districts
    Route::get(
        'districts/population/top-ten',
        [DistrictController::class, 'topTenMostPopulatedDistricts']
    );
    // get all districts from a department
    Route::get(
        'districts/department/{id}',
        [DistrictController::class, 'showDistrictsByDepartment']
    );    
});


// Protected department routes with Sanctum

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Auth routes
    Route::post('logout', [AuthController::class, 'logout']);

    Route::post(
        'departments',
        [DepartmentController::class, 'store']
    );
    Route::put(
        'departments/{id}',
        [DepartmentController::class, 'update']
    );
    Route::delete(
        'departments/{id}',
        [DepartmentController::class, 'destroy']
    );
    /* 
     Municipalities protected routes
     */
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
    /*
    Districts protected routes
    */
    Route::post(
        'districts',
        [DistrictController::class, 'store']
    );
    Route::put(
        'districts/{id}',
        [DistrictController::class, 'update']
    );
    Route::delete(
        'districts/{id}',
        [DistrictController::class, 'destroy']
    );

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
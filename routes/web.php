<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectAcceptanceController;
use App\Http\Controllers\ProjectDecommController;
use App\Http\Controllers\ProjectDocumentationController;
use App\Http\Controllers\ProjectInstallationController;
use App\Http\Controllers\ProjectMaterialController;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/projects', function () {
    return view('project.listing');
});


Route::get('/sites', function () {
    return view('site.listing');
});


Route::get('/customers', function () {
    return view('customer.listing');
});


/* Sites */
Route::get('/sites', [SiteController::class,'listing']);
Route::get('/sites/add', [SiteController::class,'create']);
Route::post('/sites', [SiteController::class,'store']);
Route::get('/sites/{site}', [SiteController::class,'edit']);
Route::put('/sites/{site}', [SiteController::class, 'update']);

/* Customer */
Route::get('/customers', [CustomerController::class,'listing']);
Route::get('/customers/add', [CustomerController::class,'create']);
Route::post('/customers', [CustomerController::class,'store']);
Route::get('/customers/{customer}', [CustomerController::class,'edit']);
Route::put('/customers/{customer}', [CustomerController::class, 'update']);

/* Project */
Route::get('/projects', [ProjectController::class,'listing']);
Route::get('/projects/add', [ProjectController::class,'create']);
Route::post('/projects', [ProjectController::class,'store']);
Route::get('/projects/{project}', [ProjectController::class,'edit']);
Route::put('/projects/{project}', [ProjectController::class, 'update']);

Route::post('/projects/{project}/materials', [ProjectMaterialController::class, 'store']);
Route::delete('/projects/materials/{projectMaterial}', [ProjectMaterialController::class, 'destroy']);

Route::post('/projects/{project}/installations', [ProjectInstallationController::class, 'store']);
Route::delete('/projects/installations/{projectInstallation}', [ProjectInstallationController::class, 'destroy']);

Route::post('/projects/{project}/acceptances', [ProjectAcceptanceController::class, 'store']);
Route::delete('/projects/acceptances/{projectAcceptance}', [ProjectAcceptanceController::class, 'destroy']);

Route::post('/projects/{project}/decomms', [ProjectDecommController::class, 'store']);
Route::delete('/projects/decomms/{projectDecomm}', [ProjectDecommController::class, 'destroy']);

Route::post('/projects/{project}/documentations', [ProjectDocumentationController::class, 'store']);
Route::delete('/projects/documentations/{projectDocumentation}', [ProjectDocumentationController::class, 'destroy']);


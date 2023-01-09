<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
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

Route::post('/loginAction', [AuthController::class,'login']);

Route::middleware('auth:api')->group(function(){
    // Route::resource('projects', ProjectController::class);
    // Route::resource('customers', CustomerController::class);
    // Route::resource('sites', SiteController::class);

    /* Sites */
    Route::get('/sites', [SiteController::class,'index']);
    Route::post('/sites', [SiteController::class,'store']);
    Route::get('/sites/{site}', [SiteController::class,'show']);
    Route::put('/sites/{site}', [SiteController::class, 'update']);
    Route::delete('/sites/{site}', [SiteController::class, 'destroy']);
    
    /* Customer */
    Route::get('/customers', [CustomerController::class,'index']);
    Route::post('/customers', [CustomerController::class,'store']);
    Route::get('/customers/{customer}', [CustomerController::class,'show']);
    Route::put('/customers/{customer}', [CustomerController::class, 'update']);
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);
    
    /* Project */
    Route::get('/projects', [ProjectController::class,'index']);
    Route::post('/projects', [ProjectController::class,'store']);
    Route::get('/projects/{project}', [ProjectController::class,'show']);
    Route::put('/projects/{project}', [ProjectController::class, 'update']);
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy']);
    
    /* Project Materials */
    Route::post('/projects/{project}/materials', [ProjectMaterialController::class, 'store']);
    Route::delete('/projects/materials/{projectMaterial}', [ProjectMaterialController::class, 'destroy']);
    
    /* Project Installations */
    Route::post('/projects/{project}/installations', [ProjectInstallationController::class, 'store']);
    Route::delete('/projects/installations/{projectInstallation}', [ProjectInstallationController::class, 'destroy']);
    
    /* Project Acceptances */
    Route::post('/projects/{project}/acceptances', [ProjectAcceptanceController::class, 'store']);
    Route::delete('/projects/acceptances/{projectAcceptance}', [ProjectAcceptanceController::class, 'destroy']);
    
    /* Project Decomms Materials */
    Route::post('/projects/{project}/decomms', [ProjectDecommController::class, 'store']);
    Route::delete('/projects/decomms/{projectDecomm}', [ProjectDecommController::class, 'destroy']);
    
    /* Project Documentations */
    Route::post('/projects/{project}/documentations', [ProjectDocumentationController::class, 'store']);
    Route::delete('/projects/documentations/{projectDocumentation}', [ProjectDocumentationController::class, 'destroy']);

});

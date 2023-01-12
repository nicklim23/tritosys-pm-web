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
use App\Http\Controllers\ProjectKanbanController;

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
    Route::get('/sites/all', [SiteController::class,'api_listing']);
    Route::get('/sites', [SiteController::class,'index']);
    Route::post('/sites', [SiteController::class,'store']);
    Route::get('/sites/{site}', [SiteController::class,'show']);
    Route::put('/sites/{site}', [SiteController::class, 'update']);
    Route::delete('/sites/{site}', [SiteController::class, 'destroy']);
    
    /* Customer */
    Route::get('/customers/all', [CustomerController::class,'api_listing']);
    Route::get('/customers', [CustomerController::class,'index']);
    Route::post('/customers', [CustomerController::class,'store']);
    Route::get('/customers/{customer}', [CustomerController::class,'show']);
    Route::put('/customers/{customer}', [CustomerController::class, 'update']);
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);
    
    /* Project */
    Route::get('/projects', [ProjectController::class,'index']);
    Route::get('/projects/api_add', [ProjectController::class,'api_create']);
    Route::post('/projects/add', [ProjectController::class,'store']);
    Route::get('/projects/{project}', [ProjectController::class,'show']);
    Route::put('/projects/{project}', [ProjectController::class, 'update']);
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy']);
    
    /* Project Materials */
    Route::get('/projects/{project}/materials', [ProjectMaterialController::class, 'index']);
    Route::post('/projects/{project}/materials', [ProjectMaterialController::class, 'store']);
    Route::get('/projects/materials/{projectMaterial}', [ProjectMaterialController::class,'show']);
    Route::delete('/projects/materials/{projectMaterial}', [ProjectMaterialController::class, 'destroy']);
    
    /* Project Installations */
    Route::get('/projects/{project}/installations', [ProjectInstallationController::class, 'index']);
    Route::post('/projects/{project}/installations', [ProjectInstallationController::class, 'store']);
    Route::get('/projects/installations/{projectInstallation}', [ProjectInstallationController::class, 'show']);
    Route::delete('/projects/installations/{projectInstallation}', [ProjectInstallationController::class, 'destroy']);
    
    /* Project Acceptances */
    Route::get('/projects/{project}/acceptances', [ProjectAcceptanceController::class, 'index']);
    Route::post('/projects/{project}/acceptances', [ProjectAcceptanceController::class, 'store']);
    Route::get('/projects/acceptances/{projectAcceptance}', [ProjectAcceptanceController::class, 'show']);
    Route::delete('/projects/acceptances/{projectAcceptance}', [ProjectAcceptanceController::class, 'destroy']);
    
    /* Project Decomms Materials */
    Route::get('/projects/{project}/decomms', [ProjectDecommController::class, 'index']);
    Route::post('/projects/{project}/decomms', [ProjectDecommController::class, 'store']);
    Route::get('/projects/decomms/{projectDecomm}', [ProjectDecommController::class, 'show']);
    Route::delete('/projects/decomms/{projectDecomm}', [ProjectDecommController::class, 'destroy']);
    
    /* Project Documentations */
    Route::get('/projects/{project}/documentations', [ProjectDocumentationController::class, 'index']);
    Route::post('/projects/{project}/documentations', [ProjectDocumentationController::class, 'store']);
    Route::get('/projects/documentations/{projectDocumentation}', [ProjectDocumentationController::class, 'show']);
    Route::delete('/projects/documentations/{projectDocumentation}', [ProjectDocumentationController::class, 'destroy']);

    /* Project Kanbans */
    Route::get('/projects/{project}/kanbans', [ProjectKanbanController::class, 'index']);
    Route::post('/projects/{project}/kanbans', [ProjectKanbanController::class, 'store']);
    Route::get('/projects/kanbans/{projectKanban}', [ProjectKanbanController::class, 'show']);
    Route::put('/projects/kanbans/{projectKanban}', [ProjectKanbanController::class, 'update']);
    Route::delete('/projects/kanbans/{projectKanban}', [ProjectKanbanController::class, 'destroy']);

});

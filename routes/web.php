<?php

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
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [LoginController::class,'index']);
Route::post('/loginAction', [LoginController::class,'login']);
Route::get('logout', [LoginController::class, 'logout']);

Route::middleware('customAuth')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    // Route::get('/projects', function () {
    //     return view('project.listing');
    // });
    
    
    // Route::get('/sites', function () {
    //     return view('site.listing');
    // });
    
    
    // Route::get('/customers', function () {
    //     return view('customer.listing');
    // });
    
    
    /* Sites */
    Route::get('/sites', [SiteController::class,'listing']);
    Route::get('/sites/add', [SiteController::class,'create']);
    Route::post('/sites', [SiteController::class,'store']);
    Route::get('/sites/{site}', [SiteController::class,'edit']);
    Route::put('/sites/{site}', [SiteController::class, 'update']);
    Route::delete('/sites/{site}', [SiteController::class, 'destroy']);
    
    /* Customer */
    Route::get('/customers', [CustomerController::class,'listing']);
    Route::get('/customers/add', [CustomerController::class,'create']);
    Route::post('/customers', [CustomerController::class,'store']);
    Route::get('/customers/{customer}', [CustomerController::class,'edit']);
    Route::put('/customers/{customer}', [CustomerController::class, 'update']);
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);
    
    /* Project */
    Route::get('/projects', [ProjectController::class,'listing']);
    Route::get('/projects/add', [ProjectController::class,'create']);
    Route::post('/projects/add', [ProjectController::class,'store']);
    Route::get('/projects/{project}', [ProjectController::class,'edit']);
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

    /* Project Kanbans */
    Route::post('/projects/{project}/kanbans', [ProjectKanbanController::class, 'store']);
    Route::put('/projects/kanbans/{projectKanban}', [ProjectKanbanController::class, 'update']);
    Route::delete('/projects/kanbans/{projectKanban}', [ProjectKanbanController::class, 'destroy']);
    
});



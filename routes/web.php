<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;

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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('auth', [AuthController::class, 'authenticate']);

Route::middleware('auth')->group(function () {
    Route::get('signout', [AuthController::class, 'signout']);
    Route::get('/', function () {
        return redirect('users');
    });
    // ADMIN ROUTES
    Route::get('users', [Users::class, 'index']);
    Route::get('users/create', [Users::class, 'create']);
    Route::get('users/edit/{id}', [Users::class, 'edit']);
    Route::get('users/show/{id}', [Users::class, 'show']);

    Route::post('users/store', [Users::class, 'store']);
    Route::post('users/application', [Users::class, 'application']);
    Route::post('users/application/delete', [Users::class, 'applicationDelete']);
    Route::post('users/delete', [Users::class, 'delete']);
    Route::post('users/update/{id}', [Users::class, 'update']);


    Route::get('applications', [ApplicationController::class, 'index']);
    Route::post('applications/delete', [ApplicationController::class, 'delete'])->middleware('admin');
    Route::get('applications/create', [ApplicationController::class, 'create'])->middleware('admin');
    Route::post('applications/store', [ApplicationController::class, 'store'])->middleware('admin');
    Route::get('applications/edit/{id}', [ApplicationController::class, 'edit'])->middleware('admin');
    Route::post('applications/update/{id}', [ApplicationController::class, 'update'])->middleware('admin');
    Route::get('applications/show/{id}', [ApplicationController::class, 'show'])->middleware('admin');

    Route::get('clients', [ClientsController::class, 'index'])->middleware('admin');
    Route::post('clients/store', [ClientsController::class, 'store'])->middleware('admin');
    Route::get('clients/create', [ClientsController::class, 'create'])->middleware('admin');
    Route::post('clients/delete', [ClientsController::class, 'delete'])->middleware('admin');
    Route::get('clients/edit/{id}', [ClientsController::class, 'edit'])->middleware('admin');
    Route::post('clients/update/{id}', [ClientsController::class, 'update'])->middleware('admin');
    Route::get('clients/show/{id}', [ClientsController::class, 'show'])->middleware('admin');
    Route::post('client/user', [ClientsController::class, 'clientuser'])->middleware('admin');
    Route::post('client/application', [ClientsController::class, 'application'])->middleware('admin');

    Route::post('client/operator', [ClientsController::class, 'clientuserOperator'])->middleware('admin');
    Route::post('client/userApp/delete', [ClientsController::class, 'clientUserAppDelete'])->middleware('admin');
});

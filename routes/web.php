<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\Users;
use App\Models\Client;
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
Route::get('{path}/login', [AuthController::class, 'login'])->name('login');
Route::get('signup', [AuthController::class, 'signup'])->name('signup');
Route::post('register', [AuthController::class, 'register']);
Route::post('auth', [AuthController::class, 'authenticate']);
Route::post('{path}/auth', [AuthController::class, 'authenticate']);



Route::middleware('auth')->group(function () {
    Route::get('{path}/signout', [AuthController::class, 'signout']);
    Route::get('/', [AuthController::class, 'redirection']);
    Route::get('{path}/', [AuthController::class, 'redirection']);
    // ADMIN ROUTES
    Route::get('{path}/users', [Users::class, 'index'])->middleware('subdomain');
    Route::get('{path}/users/create', [Users::class, 'create']);
    Route::get('{path}/users/edit/{id}', [Users::class, 'edit']);
    Route::get('{path}/users/show/{id}', [Users::class, 'show']);

    Route::post('{path}/users/store', [Users::class, 'store']);
    Route::post('{path}/users/application', [Users::class, 'application']);
    Route::post('{path}/users/application/delete', [Users::class, 'applicationDelete']);
    Route::post('{path}/users/delete', [Users::class, 'delete']);
    Route::post('{path}/users/update/{id}', [Users::class, 'update']);


    Route::get('{path}/applications', [ApplicationController::class, 'index']);
    Route::post('{path}/applications/delete', [ApplicationController::class, 'delete'])->middleware('admin');
    Route::get('{path}/applications/create', [ApplicationController::class, 'create'])->middleware('admin');
    Route::post('{path}/applications/store', [ApplicationController::class, 'store'])->middleware('admin');
    Route::get('{path}/applications/edit/{id}', [ApplicationController::class, 'edit'])->middleware('admin');
    Route::post('{path}/applications/update/{id}', [ApplicationController::class, 'update'])->middleware('admin');
    Route::get('{path}/applications/show/{id}', [ApplicationController::class, 'show']);

    Route::get('{path}/clients', [ClientsController::class, 'index'])->middleware('admin');
    Route::post('{path}/clients/store', [ClientsController::class, 'store'])->middleware('admin');
    Route::get('{path}/clients/create', [ClientsController::class, 'create'])->middleware('admin');
    Route::post('{path}/clients/delete', [ClientsController::class, 'delete'])->middleware('admin');
    Route::get('{path}/clients/edit/{id}', [ClientsController::class, 'edit'])->middleware('admin');
    Route::post('{path}/clients/update/{id}', [ClientsController::class, 'update'])->middleware('admin');
    Route::get('{path}/clients/show/{id}', [ClientsController::class, 'show'])->middleware('admin');
    Route::post('{path}/client/user', [ClientsController::class, 'clientuser'])->middleware('admin');
    Route::post('{path}/client/application', [ClientsController::class, 'application'])->middleware('admin');

    Route::post('{path}/client/operator', [ClientsController::class, 'clientuserOperator'])->middleware('admin');
    Route::post('{path}/client/userApp/delete', [ClientsController::class, 'clientUserAppDelete'])->middleware('admin');
});

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
Route::get('signout', [AuthController::class, 'signout']);

Route::post('auth', [AuthController::class, 'authenticate']);

Route::get('/', [Dashboard::class, 'index'])->middleware('auth');
Route::get('users', [Users::class, 'index'])->middleware('auth');
Route::get('users/create', [Users::class, 'create'])->middleware('auth');
Route::get('users/edit/{id}', [Users::class, 'edit'])->middleware('auth');
Route::get('users/show/{id}', [Users::class, 'show'])->middleware('auth');

Route::post('users/store', [Users::class, 'store'])->middleware('auth');
Route::post('users/application', [Users::class, 'application'])->middleware('auth');
Route::post('users/application/delete', [Users::class, 'applicationDelete'])->middleware('auth');
Route::post('users/delete', [Users::class, 'delete'])->middleware('auth');
Route::post('users/update/{id}', [Users::class, 'update'])->middleware('auth');


Route::get('applications', [ApplicationController::class, 'index'])->middleware('auth');
Route::post('applications/delete', [ApplicationController::class, 'delete'])->middleware('auth');
Route::get('applications/create', [ApplicationController::class, 'create'])->middleware('auth');
Route::post('applications/store', [ApplicationController::class, 'store'])->middleware('auth');
Route::get('applications/edit/{id}', [ApplicationController::class, 'edit'])->middleware('auth');
Route::post('applications/update/{id}', [ApplicationController::class, 'update'])->middleware('auth');
Route::get('applications/show/{id}', [ApplicationController::class, 'show'])->middleware('auth');

Route::get('clients', [ClientsController::class, 'index'])->middleware('auth');
Route::post('clients/store', [ClientsController::class, 'store'])->middleware('auth');
Route::get('clients/create', [ClientsController::class, 'create'])->middleware('auth');
Route::post('clients/delete', [ClientsController::class, 'delete'])->middleware('auth');
Route::get('clients/edit/{id}', [ClientsController::class, 'edit'])->middleware('auth');
Route::post('clients/update/{id}', [ClientsController::class, 'update'])->middleware('auth');
Route::get('clients/show/{id}', [ClientsController::class, 'show'])->middleware('auth');
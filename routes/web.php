<?php

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

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

// Get all users and return a list view
Route::get('users/list_view', [\App\Http\Controllers\UsersController::class, 'users_list_view'])->name('users_list_view');

// Return an edit view for the selected user
Route::get('user/edit_view/{$id}', [\App\Http\Controllers\UsersController::class, 'user_edit_view'])->name('user_edit_view');

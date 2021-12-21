<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\TodoListController;
use App\Http\Controllers\Admin\AdminController;



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



Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function() {
    Route::match(['get', 'post'], '/', 'AdminController@login')->name('admin');
    Route::group(['middleware' => ['admin']], function() {
        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('logout', 'AdminController@logout')->name('admin.logout');
        Route::get('settings', 'AdminController@settings')->name('admin.settings');
        Route::post('check-current-password', 'AdminController@checkCurrentPassword');
        Route::post('update-current-password', 'AdminController@updateCurrentPassword')->name('admin.update.current.password');
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails')->name('admin.update.admin.details');
        Route::get('task', 'TaskController@viewTask')->name('admin.task');
        Route::get('delete-tasks/{id}', 'TaskController@delete');


    });
});
Route::get('/', [UserController::class, 'login'])->name('home');
Route::post('/login', [UserController::class, 'login'])->name('logins');
Route::group(['middleware' => ['auth'], 'prefix'=>'user' , 'as' => 'user.'], function() {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('view-todolist', [TodoListController::class, 'viewTodoList'])->name('todolist');
    Route::post('add-task', [TodoListController::class, 'addTask'])->name('add.task');
    Route::post('edit-task', [TodoListController::class, 'editTask'])->name('edit.task');
    Route::post('edit-task', [TodoListController::class, 'editTask'])->name('edit.task');
    Route::get('delete-task/{id}', [TodoListController::class, 'deleteTask'])->name('delete.task');


});

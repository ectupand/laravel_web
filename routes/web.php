<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return redirect('tasks');});
Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/signup/check', [UserController::class, 'signup_check']);
Route::get('/tasks', [TaskController::class, 'tasks_list'])->name('tasks');
Route::get('/tasks/add', [TaskController::class, 'tasks_add'])->name('tasks_add');
Route::post('/tasks/add/check', [TaskController::class, 'tasks_add_check']);
Route::get('/tasks/{slug}/edit', [TaskController::class, 'edit_task']);
Route::put('/tasks/{slug}/edit', [TaskController::class, 'update'])->name('update');
Route::get('/users/edit', [UserController::class, 'edit']);
Route::put('/users/edit', [UserController::class, 'edit'])->name('edit');
Route::post('/users/edit/check', [UserController::class, 'edit_check']);
Route::delete('/tasks/{slug}/', [TaskController::class, 'delete'])->name('delete');

<?php

use Illuminate\Support\Facades\Route;
/* TaskControllerクラスを名前空間でインポートする */
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use Illuminate\Support\Facades\Auth;

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

/* Laravel welcome Page */
Route::get('/', function () {
    return view('welcome');
});

Route::get("/folders/{id}/tasks", [TaskController::class,"index"])->name("tasks.index");

Route::get('/folders/create', [FolderController::class,"showCreateForm"])->name('folders.create');
Route::post('/folders/create', [FolderController::class,"create"]);

Route::get('/folders/{id}/edit', [FolderController::class,"showEditForm"])->name('folders.edit');
Route::post('/folders/{id}/edit', [FolderController::class,"edit"]);

Route::
get('/folders/{id}/tasks/create', [TaskController::class,"showCreateForm"])->name('tasks.create');
Route::post('folders/{id}/tasks/create', [TaskController::class,"create"]);

Route::get('/folders/{id}/tasks/{task_id}/edit', [TaskController::class,"showEditForm"])->name('tasks.edit');
Route::post('/folders/{id}/tasks/{task_id}/edit', [TaskController::class,"edit"]);

Route::get('/folders/{id}/delete', [FolderController::class,"showDeleteForm"])->name('folders.delete');
Route::post('/folders/{id}/delete', [FolderController::class,"delete"]);

Route::get('/folders/{id}/tasks/{task_id}/delete', [TaskController::class,"showDeleteForm"])->name('tasks.delete');
Route::post('/folders/{id}/tasks/{task_id}/delete', [TaskController::class,"delete"]);

Auth::routes();

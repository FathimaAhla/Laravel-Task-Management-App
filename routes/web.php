<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\InternPanel\InternController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.tasks.index');

    Route::get('admin/tasks/index', [TaskController::class,'index'])->name('admin.tasks.index');
    Route::get('/admin/tasks/create', [TaskController::class, 'create'])->name('admin.tasks.create');
    Route::post('/admin/tasks/store', [TaskController::class,'store'])->name('admin.tasks.store');
    Route::get('/admin/tasks/{task}',  [TaskController::class,'show'])->name('admin.tasks.show');
    Route::get('/admin/tasks/{id}/edit',  [TaskController::class,'edit'])->name('admin.tasks.edit');
    Route::put('/admin/tasks/{task}',  [TaskController::class,'update'])->name('admin.tasks.update');
    Route::delete('/admin/tasks/{task}',  [TaskController::class,'destroy'])->name('admin.tasks.destroy');
});

Route::middleware(['auth','role:intern'])->group(function () {
    Route::get('intern/dashboard',[InternController::class,'index'])->name('intern.tasks.index');

    Route::get('intern/tasks/index', [TaskController::class,'internIndex'])->name('intern.tasks.index');
    Route::get('/intern/tasks/{id}/edit',  [TaskController::class,'internEdit'])->name('intern.tasks.edit');
    Route::put('/intern/tasks/{task}',  [TaskController::class,'internUpdate'])->name('intern.tasks.update');
});

// Route::resource('tasks',TaskController::class);




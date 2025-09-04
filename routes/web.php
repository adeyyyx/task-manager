<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', fn() => redirect()->route('login'));

// 🔹 Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================================
// 🔹 Admin Routes (langsung /users, /projects, /tasks)
// ================================
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
});

// ================================
// 🔹 User Routes (/my-tasks dll)
// ================================
Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/my-tasks', [TaskController::class, 'myTasks'])->name('tasks.my');

    Route::patch('/tasks/{task}/accept', [TaskController::class, 'accept'])->name('tasks.accept');
    Route::patch('/tasks/{task}/reject', [TaskController::class, 'reject'])->name('tasks.reject');
    Route::patch('/tasks/{task}/progress', [TaskController::class, 'progress'])->name('tasks.progress');
    Route::patch('/tasks/{task}/done', [TaskController::class, 'done'])->name('tasks.done');
});

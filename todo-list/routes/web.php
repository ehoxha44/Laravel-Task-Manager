<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main-page', function () {
    return view('main-page');
})->name('main-page');

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});



// Route::get('/tasks/create', function () {
//     return view('tasks.create'); 
// })->name('tasks.create');

// Route::get('/tasks/edit', function () {
//     return view('tasks.edit'); 
// })->name('tasks.edit');

// Route::get('/tasks/show', function () {
//     return view('tasks.show'); 
// })->name('tasks.show');

// Route::get('/tasks', function () {
//     return view('tasks.index');
// })->name('tasks.index');
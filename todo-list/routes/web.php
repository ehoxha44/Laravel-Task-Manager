<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main-page', function () {
    return view('main-page');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

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
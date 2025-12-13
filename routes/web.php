<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// The welcome route is fine, but you can set the root to your index page
// Route::get('/', function () {
//     return view('welcome');
// });

// The crucial single line that creates ALL 7 CRUD routes (index, create, store, show, edit, update, destroy)
// 1. CRUD & 2. MVC
Route::resource('events', EventController::class);

// Change the default route to point to your new controller (Event list)
Route::get('/', [EventController::class, 'index'])->name('home');
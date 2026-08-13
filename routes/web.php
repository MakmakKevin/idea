<?php

use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/ideas');


Route::middleware('guest')->group(function () {
    //Register routes
    Route::get('/register', [RegisterUserController::class, 'create']);
    Route::post('/register', [RegisterUserController::class, 'store']);

    //Login routes
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});


Route::middleware('auth')->group(function () {
    //Logout route
    Route::post('/logout', [SessionController::class, 'destroy']);

    //Ideas routes
    Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas.index');
    Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
}); 

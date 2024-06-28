<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImmoController;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('accueil');
// });
Route::get('/',[ImmoController::class,'index'])->name('home');
Route::get('/category/{id}',[ImmoController::class,'showCategory'])->name('showCategory');
Route::get('/details/{id}',[ImmoController::class,'showDetails'])->name('showDetails');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

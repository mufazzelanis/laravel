<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
Route::get('/crud-data', [CrudController::class, 'getData']);
Route::get('/',[CrudController::class,'showData']);
Route::get('/add-data',[CrudController::class,'addData']);
Route::post('/store-data',[CrudController::class,'storeData']);


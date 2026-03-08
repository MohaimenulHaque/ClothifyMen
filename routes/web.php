<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\RequestMatcher\HeaderRequestMatcher;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('shop', function () {
    return view('shop');
})->name('shop');


Route::get('/test', function () {
    return view('test');
})->name('test');



// Route::get('/dashboard',[UserController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// ------------------------------------------
// Admin Authentication HeaderRequestMatcher
// ------------------------------------------
Route::middleware('admin')->group(function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/categories',[AdminController::class,'categories'])->name('categories');
    Route::get('/addCategory',[AdminController::class,'addCategory'])->name('addCategory');
    Route::post('/storeCategory',[AdminController::class,'storeCategory'])->name('storeCategory');
    Route::get('/editCategory/{id}',[AdminController::class,'editCategory'])->name('editCategory');
});


<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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
    Route::post('/updateCategory/{id}',[AdminController::class,'updateCategory'])->name('updateCategory');
    Route::get('/deleteCategory/{id}',[AdminController::class,'deleteCategory'])->name('deleteCategory');


    // Product Controller Start Here
    Route::get('admin/products',[ProductController::class,'products'])->name('admin.products');
    Route::get('admin/addProduct',[ProductController::class,'addProduct'])->name('admin.addProduct');
    Route::post('admin/storeProduct',[ProductController::class,'storeProduct'])->name('admin.storeProduct');
    Route::get('admin/editProduct/{id}',[ProductController::class,'editProduct'])->name('admin.editProduct');
    Route::post('admin/updateProduct/{id}',[ProductController::class,'updateProduct'])->name('admin.updateProduct');
    Route::get('admin/deleteProduct/{id}',[ProductController::class,'deleteProduct'])->name('admin.deleteProduct');



    Route::get('admin/settings/webSettings',[AdminController::class,'webSettings'])->name('admin.webSettings');

    Route::get('admin/settings/page2',function(){
        return view('admin.page2');
    })->name('admin.page2');

});


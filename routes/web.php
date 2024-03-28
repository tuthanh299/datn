<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Route::get('login', [AdminController::class, 'loginAdmin'])->name('login');
Route::post('login', [AdminController::class, 'postLoginAdmin'])->name('post.login');
 

Route::get('/home', function () {
    return view('home');
});

Route::get('/', function () {
    return view('home');
});
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

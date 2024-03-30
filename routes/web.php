<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

 
Route::get('/login', [AdminController::class, 'loginAdmin'])->name('login'); 
Route::post('/login', [AdminController::class, 'postLoginAdmin']);
 
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/homepage', function () {
    return view('homepage');
}); 


Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    });
});


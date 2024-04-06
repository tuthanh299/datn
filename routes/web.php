<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AdminController::class, 'loginAdmin'])->name('login');
Route::post('/login', [AdminController::class, 'postLoginAdmin']);

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::prefix('admin')->group(function () {

    /* User */
    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    });
    /* Setting */
    
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('setting/update', [SettingController::class, 'update'])->name('setting.update');
    /* Category */
    Route::prefix('categories')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    });
    /* Slider */
    Route::prefix('slider')->group(function () {
        Route::get('', [SliderController::class, 'index'])->name('slider.index');
        Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
    });
    /* Author */
    Route::prefix('author')->group(function () {
        Route::get('', [AuthorController::class, 'index'])->name('author.index');
        Route::get('/create', [AuthorController::class, 'create'])->name('author.create');
        Route::post('/store', [AuthorController::class, 'store'])->name('author.store');
        Route::get('/edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
        Route::post('/update/{id}', [AuthorController::class, 'update'])->name('author.update');
        Route::get('/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
    });
    /* Publisher */
    Route::prefix('publisher')->group(function () {
        Route::get('', [PublisherController::class, 'index'])->name('publisher.index');
        Route::get('/create', [PublisherController::class, 'create'])->name('publisher.create');
        Route::post('/store', [PublisherController::class, 'store'])->name('publisher.store');
        Route::get('/edit/{id}', [PublisherController::class, 'edit'])->name('publisher.edit');
        Route::post('/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
        Route::get('/delete/{id}', [PublisherController::class, 'delete'])->name('publisher.delete');
    });
    /*Invoice Import*/
    /*Route::prefix('invoice-import')->group(function() {
        Route::get('',[InvoiceImportController::class, 'index'])->name('import.index');
    });*/
    /*Products*/
    Route::prefix('product')->group(function() {
        Route::get('',[ProductController::class, 'index'])->name('product.index');
    });
});

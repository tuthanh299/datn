<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StaticNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SettingController;
/* Clients */
use App\Http\Controllers\Clients\IndexController;
use App\Http\Controllers\Clients\CAboutusController;
use App\Http\Controllers\Clients\CNewsController;
use App\Http\Controllers\Clients\CProductController;

Route::get('/login', [AdminController::class, 'loginAdmin'])->name('login');
Route::post('/login', [AdminController::class, 'postLoginAdmin']);

Route::get('/admin', function () {
    return view('admin.admin');
})->middleware('auth');

Route::prefix('/')->group(function () {
    /* Index */
    Route::controller(IndexController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/news/{id}', [CNewsController::class, 'detail'])->name('news.detail');
    });
    /* About Us */
    Route::controller(CAboutusController::class)->group(function () {
        Route::get('/aboutus', 'index')->name('aboutus');
    });
    /* News */
    Route::controller(CNewsController::class)->group(function () {
        Route::get('/news', 'index')->name('news');
        Route::get('/news/{id}', [CNewsController::class, 'detail'])->name('news.detail');
    });
    /* Product */
    Route::controller(CProductController::class)->group(function () {
        Route::get('/product', 'index')->name('product');
        Route::get('/product/{id}', [CProductController::class, 'detail'])->name('product.detail');
    });

});

Route::prefix('admin')->group(function () {
    /* Dashboard */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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
    /* Staticnews */
    Route::get('staticnews', [StaticNewsController::class, 'index'])->name('staticnews.index');
    Route::post('staticnews/update', [StaticNewsController::class, 'update'])->name('staticnews.update');

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

    /* Publisher */
    Route::prefix('publisher')->group(function () {
        Route::get('', [PublisherController::class, 'index'])->name('publisher.index');
        Route::get('/create', [PublisherController::class, 'create'])->name('publisher.create');
        Route::post('/store', [PublisherController::class, 'store'])->name('publisher.store');
        Route::get('/edit/{id}', [PublisherController::class, 'edit'])->name('publisher.edit');
        Route::post('/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
        Route::get('/delete/{id}', [PublisherController::class, 'delete'])->name('publisher.delete');
    });
    /* News */
    Route::prefix('news')->group(function () {
        Route::get('', [NewsController::class, 'index'])->name('news.index');
        Route::get('/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/store', [NewsController::class, 'store'])->name('news.store');
        Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
        Route::post('/update/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::get('/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');
    });
    /* Product */
    Route::prefix('product')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });

});

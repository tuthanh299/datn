<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Clients\CAboutusController;
use App\Http\Controllers\Clients\CCartController;
use App\Http\Controllers\Clients\CNewsController;
use App\Http\Controllers\Clients\CProductController;
use App\Http\Controllers\Clients\CSearchController;
use App\Http\Controllers\Clients\CUserController;
use App\Http\Controllers\Clients\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportInvoiceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StaticNewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
/* Cart */
Route::get('/cart', [CCartController::class, 'cartUser'])->name('user.cart');
Route::get('/payment', [CCartController::class, 'paymentUser'])->name('user.payment');

/* Client */
Route::get('/sign-in', [CUserController::class, 'loginUser'])->name('user.login');
Route::get('/register', [CUserController::class, 'registerUser'])->name('user.register');

Route::prefix('/')->group(function () {
    /* Index */
    Route::controller(IndexController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get-category-data/{categoryId}', [IndexController::class, 'getCategoryData'])->name('get-category-data');
        Route::get('/publisher/{id}', [IndexController::class, 'publisherproduct'])->name('publisher.publisherproduct');
        Route::get('/categoryid/{id}', [IndexController::class, 'categoryidproduct'])->name('categoryid.categoryidproduct');
    });
    /* Search */
    Route::controller(CSearchController::class)->group(function () {
        Route::get('/search', 'index')->name('search');
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

Route::get('/admin', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [AdminController::class, 'logoutAdmin'])->name('logout.admin');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::prefix('admin')->group(function () {
        /* Dashboard */
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /* Import_invoice */
        Route::prefix('import_invoice')->group(function () {
            Route::get('', [ImportInvoiceController::class, 'index'])->name('import_invoice.index');
            Route::get('/create', [ImportInvoiceController::class, 'create'])->name('import_invoice.create');
            Route::post('/store', [ImportInvoiceController::class, 'store'])->name('import_invoice.store');
            Route::get('/view/{id}', [ImportInvoiceController::class, 'view'])->name('import_invoice.view');
            Route::get('/get-product-id', [ImportInvoiceController::class, 'getProductId'])->name('get-product-id]');
        });
        /* User */
        Route::prefix('users')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('users.index')->middleware('can:users-list');
            Route::get('/create', [UserController::class, 'create'])->name('users.create')->middleware('can:users-add');
            Route::post('/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update')->middleware('can:users-edit');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete')->middleware('can:users-delete');
        });

        /* Role */
        Route::prefix('roles')->group(function () {
            Route::get('', [RoleController::class, 'index'])->name('roles.index')->middleware('can:roles-list');
            Route::get('/create', [RoleController::class, 'create'])->name('roles.create')->middleware('can:roles-add');
            Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit')->middleware('can:roles-edit');
            Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
            Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete')->middleware('can:roles-delete');
        });

        /* Setting */
        Route::get('setting', [SettingController::class, 'index'])->name('setting.index')->middleware('can:setting-list');
        Route::post('setting/update', [SettingController::class, 'update'])->name('setting.update')->middleware('can:setting-edit');

        /* Staticnews */
        Route::get('staticnews', [StaticNewsController::class, 'index'])->name('staticnews.index')->middleware('can:staticnews-list');
        Route::post('staticnews/update', [StaticNewsController::class, 'update'])->name('staticnews.update')->middleware('can:staticnews-edit');

        /* Category */
        Route::prefix('categories')->group(function () {
            Route::get('', [CategoryController::class, 'index'])->name('categories.index')->middleware('can:category-list');
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('can:category-add');
            Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('can:category-edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete')->middleware('can:category-delete');
        });

        /* Slider */
        Route::prefix('slider')->group(function () {
            Route::get('', [SliderController::class, 'index'])->name('slider.index')->middleware('can:slider-list');
            Route::get('/create', [SliderController::class, 'create'])->name('slider.create')->middleware('can:slider-add');
            Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
            Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit')->middleware('can:slider-edit');
            Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
            Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete')->middleware('can:slider-delete');
        });

        /* Publisher */
        Route::prefix('publisher')->group(function () {
            Route::get('', [PublisherController::class, 'index'])->name('publisher.index')->middleware('can:publisher-list');
            Route::get('/create', [PublisherController::class, 'create'])->name('publisher.create')->middleware('can:publisher-add');
            Route::post('/store', [PublisherController::class, 'store'])->name('publisher.store');
            Route::get('/edit/{id}', [PublisherController::class, 'edit'])->name('publisher.edit')->middleware('can:publisher-edit');
            Route::post('/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
            Route::get('/delete/{id}', [PublisherController::class, 'delete'])->name('publisher.delete')->middleware('can:publisher-delete');
        });

        /* News */
        Route::prefix('news')->group(function () {
            Route::get('', [NewsController::class, 'index'])->name('news.index')->middleware('can:news-list');
            Route::get('/create', [NewsController::class, 'create'])->name('news.create')->middleware('can:news-add');
            Route::post('/store', [NewsController::class, 'store'])->name('news.store');
            Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit')->middleware('can:news-edit');
            Route::post('/update/{id}', [NewsController::class, 'update'])->name('news.update');
            Route::get('/delete/{id}', [NewsController::class, 'delete'])->name('news.delete')->middleware('can:news-delete');
        });

        /* Product */
        Route::prefix('product')->group(function () {
            Route::get('', [ProductController::class, 'index'])->name('product.index')->middleware('can:product-list');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create')->middleware('can:product-add');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware('can:product-edit');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete')->middleware('can:product-delete');
        });

    });
});


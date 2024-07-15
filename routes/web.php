<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
 
use App\Http\Controllers\Clients\CCartController;
use App\Http\Controllers\Clients\CChangePasswordController;
use App\Http\Controllers\Clients\CInfoController;
use App\Http\Controllers\Clients\CNewsController;
use App\Http\Controllers\Clients\COrderController;
use App\Http\Controllers\Clients\CProductController;
use App\Http\Controllers\Clients\CSearchController;
use App\Http\Controllers\Clients\CUserController;
use App\Http\Controllers\Clients\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportOrderController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
 use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/* Client */
Route::get('/sign-in', [CUserController::class, 'clientLogin'])->name('user.login');
Route::post('check-login', [CUserController::class, 'postlogin'])->name('user.postlogin');
Route::get('/register', [CUserController::class, 'clientRegister'])->name('user.register');
Route::post('check-register', [CUserController::class, 'postregister'])->name('user.postregister');
Route::get('logout', [CUserController::class, 'logout'])->name('user.logout');

/* GOOGLE LOGIN */
//Route::get('/auth/{provider}/redirect', [GoogleLoginController::class, 'redirect'])->name('redirect');
//Route::get('/auth/{provider}/callback', [GoogleLoginController::class, 'callback'])->name('callback');
Route::get('/auth/google', [GoogleLoginController::class, 'redirect'])->name('redirect');
Route::get('/auth/google/callback', [GoogleLoginController::class, 'callback'])->name('callback');

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
  
    
    /* News */
    Route::controller(CNewsController::class)->group(function () {
        Route::get('/news', 'index')->name('news');
        Route::get('/news/{id}', [CNewsController::class, 'detail'])->name('news.detail');
    });
    /* Product */
    Route::controller(CProductController::class)->group(function () {
        Route::get('/product', 'index')->name('product');
        Route::get('/product/{id}', [CProductController::class, 'detail'])->name('product.detail');
        Route::get('/product/{id}/buy-now', 'add')->name('product.add');
    });

    /* Cart */
    Route::controller(CCartController::class)->group(function () {
        Route::get('/cart', 'index')->name('user.cart');
        Route::get('/cart/add/{id?}&{quantity?}', 'add_index')->name('add_index.cart');
        Route::get('/cart/update_quantity/{id?}&{method?}', 'changeQuantity')->name('update_quantity.cart');
        Route::get('/cart/delete/{id}', 'delete')->name('delete.cart');
        //Route::patch('/cart/update/{id}', 'update_qty')->name('update.cart');

    });

    /* Info */
    Route::controller(CInfoController::class)->group(function () {
        Route::get('user-info', 'index')->name('user.info');
        Route::post('user-info/update', 'update')->name('user.info.update');
        Route::delete('user-info/delete', 'delete')->name('user.info.delete');
    });

    /*Order*/
    Route::controller(COrderController::class)->group(function () {
        Route::get('order', 'index')->name('user.order');
        Route::get('order/{id}', 'detail')->name('user.order.detail');
    });

    /*Address Change*/
    /*Route::controller(CChangeAddressController::class)->group(function() {
    Route::get('change-address', 'index')->name('user.changeaddress.index');
    Route::post('change-address/update', 'update')->name('user.changeaddress.update');
    });*/

    /*Password Change*/
    Route::controller(CChangePasswordController::class)->group(function () {
        Route::get('change-password', 'index')->name('user.changepassword');
        Route::post('change-password/update', 'update')->name('user.changepassword.update');
    });

    /* PAYMENT */

    Route::controller(PaymentController::class)->group(function () {
        Route::get('/payment', 'index')->name('user.payment');
        Route::post('/cod_payment', 'cod_payment')->name('cod');
        Route::post('/vnpay_payment', 'vnpay_payment')->name('vnpay');
        Route::get('/vnpay_return', 'return')->name('vnpay.return');
    });

    /*VNPAY*/
    Route::post('/vnpay_return', [PaymentController::class, 'return'])->name('vnpay.return');
});

Route::get('/admin', [HomeController::class, 'index'])->name('home');
Route::get('/logoutadmin', [AdminController::class, 'logoutAdmin'])->name('logout.admin');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::prefix('admin')->group(function () {
        /* Dashboard */
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('can:statistic-list');
        Route::get('/dashboard/{month?}&{year?}', [DashboardController::class, 'filter'])->name('ajax.dashboard');
        Route::prefix('order')->group(function () {
            Route::get('', [OrderController::class, 'index'])->name('order.index')->middleware('can:order-list');
            Route::get('/view/{id}', [OrderController::class, 'view'])->name('order.view')->middleware('can:order-view-edit');
        });
        /* Import_order */
        Route::prefix('import_order')->group(function () {
            Route::get('', [ImportOrderController::class, 'index'])->name('import_order.index')->middleware('can:import-order-list');
            Route::get('/create', [ImportOrderController::class, 'create'])->name('import_order.create')->middleware('can:import-order-add');
            Route::post('/store', [ImportOrderController::class, 'store'])->name('import_order.store')->middleware('can:import-order-view');
            Route::get('/delete/{id}', [ImportOrderController::class, 'delete'])->name('import_order.delete')->middleware('can:import-order-delete');
            Route::get('/view/{id}', [ImportOrderController::class, 'view'])->name('import_order.view');
            Route::get('/get-product-id', [ImportOrderController::class, 'getProductId'])->name('get-product-id]');
        });
        /* User */
        Route::prefix('users')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('users.index')->middleware('can:users-list');
            Route::get('/create', [UserController::class, 'create'])->name('users.create')->middleware('can:users-add');
            Route::post('/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit')->middleware('can:users-edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete')->middleware('can:users-delete');
        });
        /* Member */
        Route::prefix('member')->group(function () {
            Route::get('', [MemberController::class, 'index'])->name('member.index')->middleware('can:member-list');
            Route::get('/create', [MemberController::class, 'create'])->name('member.create')->middleware('can:member-add');
            Route::post('/store', [MemberController::class, 'store'])->name('member.store');
            Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('member.edit')->middleware('can:member-edit');
            Route::post('/update/{id}', [MemberController::class, 'update'])->name('member.update');
            Route::get('/delete/{id}', [MemberController::class, 'delete'])->name('member.delete')->middleware('can:member-delete');
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
            Route::get('/get-category-id', [ProductController::class, 'getCategoryId'])->name('get-category-id');
            Route::get('/get-category-id-warehouse', [ProductController::class, 'getCategoryIdWarehouse'])->name('get-category-id-warehouse');

        });
        /* Warehouse */
        Route::prefix('warehouse')->group(function () {
            Route::get('', [ProductController::class, 'warehouse'])->name('product.warehouse')->middleware('can:warehouse-list');
        });

    });
});

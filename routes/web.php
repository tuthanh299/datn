<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
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
use App\Http\Controllers\HomePageController;
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
    /* Login */
    //Route::get('login', [HomePageController::class, 'clientlogin'])->name('client.login');
    Route::get('login', [CUserController::class, 'clientLogin'])->name('client.login');
    //Route::post('check-login', [HomePageController::class, 'postlogin'])->name('client.postlogin');
    Route::post('check-login', [CUserController::class, 'postlogin'])->name('client.postlogin');

    /* Register */
    //Route::get('register', [HomePageController::class, 'clientregister'])->name('client.register');
    Route::get('register', [CUserController::class, 'clientRegister'])->name('client.register');
    //Route::post('check-register', [HomePageController::class, 'postregister'])->name('client.postregister');
    Route::post('check-register', [CUserController::class, 'postregister'])->name('client.postregister');

    Route::get('logout', [HomePageController::class, 'logout'])->name('client.logout');

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

    /* Cart */
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('client.cart');
    });

    /* Info */

    Route::controller(IndexController::class)->group(function () {
        Route::get('/info', 'userinfo')->name('client.info');
    });

});

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::get('/admin', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [AdminController::class, 'logoutAdmin'])->name('logout');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    
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

    /* User */
    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    });
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
    /*Route::prefix('author')->group(function () {
        Route::get('', [AuthorController::class, 'index'])->name('author.index');
        Route::get('/create', [AuthorController::class, 'create'])->name('author.create');
        Route::post('/store', [AuthorController::class, 'store'])->name('author.store');
        Route::get('/edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
        Route::post('/update/{id}', [AuthorController::class, 'update'])->name('author.update');
        Route::get('/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
    });*/
    /* Publisher */
    Route::prefix('publisher')->group(function () {
        Route::get('', [PublisherController::class, 'index'])->name('publisher.index');
        Route::get('/create', [PublisherController::class, 'create'])->name('publisher.create');
        Route::post('/store', [PublisherController::class, 'store'])->name('publisher.store');
        Route::get('/edit/{id}', [PublisherController::class, 'edit'])->name('publisher.edit');
        Route::post('/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
        Route::get('/delete/{id}', [PublisherController::class, 'delete'])->name('publisher.delete');
    });
});
});

/*Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('redirect');
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback'])->name('callback');*/

Route::get('cart', [CartController::class, 'index'])->name('cart.index'); 
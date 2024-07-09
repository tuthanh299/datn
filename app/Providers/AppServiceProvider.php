<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('formatmoney', function ($money) {
            return "<?php echo number_format($money, 0,',','.').'đ'; ?>";
        });
        Gate::define('category-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_category');
            
        });
        Gate::define('category-add', function (User $user) {
            return  $user->CheckPermissionAccess('add_category');
            
        });
        Gate::define('category-edit', function (User $user) {
            return  $user->CheckPermissionAccess('edit_category');
            
        });
        Gate::define('category-delete', function (User $user) {
            return  $user->CheckPermissionAccess('delete_category');
            
        }); 

        Gate::define('slider-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_slider');
            
        });
        Gate::define('slider-add', function (User $user) {
            return  $user->CheckPermissionAccess('add_slider');
            
        });
        Gate::define('slider-edit', function (User $user) {
            return  $user->CheckPermissionAccess('edit_slider');
            
        });
        Gate::define('slider-delete', function (User $user) {
            return  $user->CheckPermissionAccess('delete_slider');
            
        });

        Gate::define('users-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_user');
            
        });
        Gate::define('users-add', function (User $user) {
            return  $user->CheckPermissionAccess('add_user');
            
        });
        Gate::define('users-edit', function (User $user) {
            return  $user->CheckPermissionAccess('edit_user');
            
        });
        Gate::define('users-delete', function (User $user) {
            return  $user->CheckPermissionAccess('delete_user');
            
        });
        Gate::define('roles-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_role');
            
        });
        Gate::define('roles-add', function (User $user) {
            return  $user->CheckPermissionAccess('add_role');
            
        });
        Gate::define('roles-edit', function (User $user) {
            return  $user->CheckPermissionAccess('edit_role');
            
        });
        Gate::define('roles-delete', function (User $user) {
            return  $user->CheckPermissionAccess('delete_role');
            
        });
        Gate::define('publisher-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_publisher');
            
        });
        Gate::define('publisher-add', function (User $user) {
            return  $user->CheckPermissionAccess('add_publisher');
            
        });
        Gate::define('publisher-edit', function (User $user) {
            return  $user->CheckPermissionAccess('edit_publisher');
            
        });
        Gate::define('publisher-delete', function (User $user) {
            return  $user->CheckPermissionAccess('delete_publisher');
            
        });
        Gate::define('news-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_news');
            
        });
        Gate::define('news-add', function (User $user) {
            return  $user->CheckPermissionAccess('add_news');
            
        });
        Gate::define('news-edit', function (User $user) {
            return  $user->CheckPermissionAccess('edit_news');
            
        });
        Gate::define('news-delete', function (User $user) {
            return  $user->CheckPermissionAccess('delete_news');
            
        });
        Gate::define('product-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_product');
            
        });
        Gate::define('product-add', function (User $user) {
            return  $user->CheckPermissionAccess('add_product');
            
        });
        Gate::define('product-edit', function (User $user) {
            return  $user->CheckPermissionAccess('edit_product');
            
        });
        Gate::define('product-delete', function (User $user) {
            return  $user->CheckPermissionAccess('delete_product');
            
        });
        Gate::define('setting-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_setting');
            
        });
        Gate::define('setting-edit', function (User $user) {
            return  $user->CheckPermissionAccess('edit_setting');
            
        });
        Gate::define('staticnews-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_staticnews');
            
        });
        Gate::define('staticnews-edit', function (User $user) {
            return  $user->CheckPermissionAccess('edit_staticnews');
            
        });
        Gate::define('warehouse-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_warehouse');
            
        });
        Gate::define('import-order-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_import_order');
            
        });
        Gate::define('import-order-add', function (User $user) {
            return  $user->CheckPermissionAccess('add_import_order');
            
        });
        Gate::define('import-order-view', function (User $user) {
            return  $user->CheckPermissionAccess('view_import_order');
            
        });
        Gate::define('import-order-delete', function (User $user) {
            return  $user->CheckPermissionAccess('delete_import_order');
            
        });
        Gate::define('order-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_order');
            
        });
        Gate::define('order-view-edit', function (User $user) {
            return  $user->CheckPermissionAccess('view_edit_order');
            
        });
        Gate::define('statistic-list', function (User $user) {
            return  $user->CheckPermissionAccess('list_statistic');
            
        });
        
        Schema::defaultStringLength(length: 191);
    }
}

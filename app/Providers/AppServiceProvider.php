<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use PHPUnit\Event\TestRunner\BootstrapFinished;

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
        View::composer('client.app.nav', function ($view) {
            $categories = Category::whereNull('parent_id')
                ->with('children')
                ->get();
            $view->with('categories', $categories);
        });
    }
}

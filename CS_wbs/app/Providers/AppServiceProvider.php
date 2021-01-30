<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categorys = Category::all();
        $categories = Category::all();
        $authors = Author::all();
        View::share('categorys', $categorys);
        View::share('authors', $authors);
        View::share('categories', $categories);
    }
}

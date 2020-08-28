<?php

namespace App\Providers;

use App\Post;
use Illuminate\Support\ServiceProvider;
use View;

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
        View::composer('partials.footer', function ($view) {
            $view->with('posts', Post::orderBy('created_at', 'DESC')->take(2)->get());
        });
    }
}

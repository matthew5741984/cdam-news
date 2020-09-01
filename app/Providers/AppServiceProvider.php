<?php

namespace App\Providers;

use App\Navigation;
use App\Post;
use Illuminate\Support\Facades\URL;
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

        View::composer('partials.jumbotron-2', function ($view) {
            $current_path = "/" . explode('/', URL::current())[3];
            $view->with('navigations', Navigation::all());
            $view->with('current_path', $current_path);
        });
    }
}

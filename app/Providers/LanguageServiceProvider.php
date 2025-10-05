<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Share locale data with all views
        View::composer('*', function ($view) {
            $view->with([
                'currentLocale' => App::getLocale(),
                'availableLocales' => ['vi', 'en'],
                'localeNames' => [
                    'vi' => 'Tiếng Việt',
                    'en' => 'English'
                ]
            ]);
        });
    }
}

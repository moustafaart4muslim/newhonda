<?php

namespace Invade\Honda;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::booted(function () {
            Nova::theme(asset('/invade/honda/theme.css'));
            Nova::theme(asset('/invade/honda/style.css'));
            Nova::remoteScript('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js');
            Nova::remoteScript(asset('/invade/honda/scripts.js'));

        });

        $this->publishes([
            __DIR__.'/../resources/css' => public_path('invade/honda'),
            __DIR__.'/../resources/js' => public_path('invade/honda'),
        ], 'public');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

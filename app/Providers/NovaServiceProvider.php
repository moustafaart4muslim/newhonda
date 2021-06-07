<?php

namespace App\Providers;

use App\Nova\Metrics\TotalCars as MetricsTotalCars;
use App\Nova\Metrics\TotalMotors;

use Illuminate\Support\Facades\Gate;
use Invade\Totalcars\Totalcars;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
// use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Tests\Fixtures\TotalUsers;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', -1);
         parent::boot();
        // Nova::style('mostafa', public_path('css/mostafa.css'));
        // Nova::style('invade', __DIR__.'/../dist/css/mostafa.css');
        Nova::sortResourcesBy(function ($resource) {
            return $resource::$priority ?? 9999;
        });
    
        \OptimistDigital\NovaSettings\NovaSettings::addSettingsFields([
            Text::make('Phone Number', 'phone_number'),
            Text::make('Email receivers (separate by comma)', 'email_receivers')
            ->help('Please enter the email addresess that should receive site form messages'),
        ]);
        
        \OptimistDigital\NovaSettings\NovaSettings::addSettingsFields([
            Text::make('Facebook', 'facebook'),            
            Text::make('Twitter', 'twitter'),            
            Text::make('Youtube', 'youtube'),            
            Text::make('Vimeo', 'vimeo'),            
            Text::make('Instagram', 'instagram'),            
        ], [], 'Social');
        
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'sitemanager@hondaegypt.com.eg'
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            // new Help,
            (new MetricsTotalCars)->width('1/2'),
            (new TotalMotors)->width('1/2'),
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            \ChrisWare\NovaBreadcrumbs\NovaBreadcrumbs::make(),
            new \OptimistDigital\NovaSettings\NovaSettings,
            new \Runline\ProfileTool\ProfileTool,

        ];
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

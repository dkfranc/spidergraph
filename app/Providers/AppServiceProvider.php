<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(
            base_path('resources' . DIRECTORY_SEPARATOR . 'lang' . DIRECTORY_SEPARATOR 
            . 'admin' . DIRECTORY_SEPARATOR),
        'admin');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register dependency packages
        $this->app->register('Collective\Html\HtmlServiceProvider');
        $this->app->register('Intervention\Image\ImageServiceProvider');
        $this->app->register('Yajra\Datatables\DatatablesServiceProvider');
        // Register dependancy aliases
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('HTML', 'Collective\Html\HtmlFacade');
        $loader->alias('Form', 'Collective\Html\FormFacade');
        $loader->alias('Image', 'Intervention\Image\Facades\Image');
        $loader->alias('Datatables', 'Yajra\Datatables\Datatables');
    }
}

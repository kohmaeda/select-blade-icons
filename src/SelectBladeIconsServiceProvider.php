<?php

namespace Wirke\SelectBladeIcons;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Wirke\SelectBladeIcons\BladeIcons;

class SelectBladeIconsServiceProvider extends ServiceProvider
{

    public function register()
    {
       
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'select-blade-icons');
        Blade::component('blade-icons', BladeIcons::class);
    }

}
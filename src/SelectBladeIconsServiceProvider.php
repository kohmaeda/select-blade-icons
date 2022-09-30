<?php

namespace Wirke\SelectBladeIcons;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Wirke\SelectBladeIcons\SelectBladeIcon;

class SelectBladeIconsServiceProvider extends ServiceProvider
{

    public function register()
    {

    }

    public function boot()
    {
        Blade::component('select-blade-icon', SelectBladeIcon::class);
    }

}

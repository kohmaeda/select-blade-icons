## Overview

This is a shell around [BladeIcons](https://github.com/blade-ui-kit/blade-icons) for Wordpress and [ACF-Composer](https://github.com/Log1x/acf-composer) to add a selector and a safer way to implement the components.


## Installation

1. Install the package:
    ```sh
    $ composer require wirke/select-blade-icons
    ```
2. Install [BladeIcons](https://github.com/blade-ui-kit/blade-icons) and any of its "Icon Packages"

## Usage

1. Use the Selector by using "Wirke\SelectBladeIcons\IconSelector" where you declare your Fields and add the selector with
    ```php
    ->addFields($this->get(IconSelector::class))
    ```
2. In the coresponding blade file you then add our bladeicon component
    ```php
    <x-blade-icons :iconName="$icon" class="w-6 h-6 text-gray-200 "/>
    ```
<?php

namespace Wirke\SelectBladeIcons;

use Illuminate\View\Component;

class BladeIcons extends Component
{
    public $iconName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($iconName = null)
    {   
        if(str_contains($iconName,'-')){
            list($iconPackage,$name) = explode('-',$iconName,2);
        } else {
            $iconPackage = 'heroicon';
            $name = 's-question-mark-circle';
        }
        $fallback = 'heroicon-s-question-mark-circle';
        $icon[$iconPackage] = $name;


        switch($iconPackage){
            case 'heroicon': 
                $iconPackageUrl = '/vendor/blade-ui-kit/blade-heroicons/resources/svg/*.svg';
                break;
            case 'bi': 
                $iconPackageUrl = '/vendor/davidhsianturi/blade-bootstrap-icons/resources/svg/*.svg';
                break;
        }
        $filesPath = get_theme_file_path() . $iconPackageUrl;
        $avialableIcons = collect(glob($filesPath))->map(function ($field) {
            return str_replace('.svg','',basename($field));
        });

        if($iconName){
            $this->iconName = $iconPackage . '-' . $icon[$iconPackage];
            if($avialableIcons->contains($icon[$iconPackage])){
                $this->iconName = $iconPackage . '-' . $icon[$iconPackage];
            } else {
                $this->iconName = $fallback;
            }
        } else {
            $this->iconName = $fallback;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('select-blade-icons::blade-icons');
    }
}

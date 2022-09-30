<?php

namespace Wirke\SelectBladeIcons;

use Illuminate\View\Component;

class SelectBladeIcon extends Component
{
    public $iconName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($iconName = null)
    {
        $fallback = 'heroicon-s-question-mark-circle';
        list($iconPackage,$name) = explode('-',$iconName,2);
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
            $this->iconName = $iconName;
            if($avialableIcons->contains($icon[$iconPackage])){
                $this->iconName = $iconName;
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
        return view('select-blade-icon');
    }
}

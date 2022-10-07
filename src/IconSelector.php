<?php

namespace Wirke\SelectBladeIcons;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class IconSelector extends Partial
{

    /**
     * The partial field group.
     *
     * @return array
     */
    public function fields()
    {
        $iconOptions = [];
        $iconPackages = [
            'heroicon','bi'
        ];
        foreach($iconPackages as $iconPackage){
            switch($iconPackage){
                case 'heroicon': 
                    $iconPackageUrl = '/vendor/blade-ui-kit/blade-heroicons/resources/svg/*.svg';
                    break;
                case 'bi': 
                    $iconPackageUrl = '/vendor/davidhsianturi/blade-bootstrap-icons/resources/svg/*.svg';
                    break;
            }
            $filesPath = get_theme_file_path() . $iconPackageUrl;
            foreach(glob($filesPath) as $file) {
                $iconSlug = $iconPackage . '-' . str_replace('.svg','',basename($file));    
                $iconOptions[$iconSlug] = $iconSlug;             
            }
        }
        $iconselect = new FieldsBuilder('iconselect');

        $iconselect
        ->addSelect('selected_icon', [
            'label' => "Select an Icon",
            'choices' => $iconOptions,
            'ui' => 1,
            'default_value' => ''
               ]);
                

        return $iconselect;
    }
}

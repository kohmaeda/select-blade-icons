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
        $iconselect = new FieldsBuilder('iconselect');

        $iconselect
        ->addRadio('selected_icon', [
            'label' => "Select an Icon",
            'choices' => [
                'bi-facebook'			=> 'Facebook',
                'bi-instagram'			=> 'Instagram',
                'bi-twitter'			=> 'Twitter',
                'bi-linkedin'			=> 'LinkedIn',
                'bi-youtube'			=> 'YouTube',
                'heroicon-s-status-online' => 'Status'
            ],
            'default_value' => ''
               ]);
                

        return $iconselect;
    }
}

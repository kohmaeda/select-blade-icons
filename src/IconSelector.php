<?php

namespace Wirke\SelectBladeIcons;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class IconSelector extends Partial
{
    public $iconPackages = [
        'zondicon' => '/vendor/blade-ui-kit/blade-zondicons/resources/svg/*.svg',
        'wi' => '/vendor/codeat3/blade-weather-icons/resources/svg/*.svg',
        'codicon' => '/vendor/codeat3/blade-codicons/resources/svg/*.svg',
        'vaadin' => '/vendor/codeat3/blade-vaadin-icons/resources/svg/*.svg',
        'uni' => '/vendor/codeat3/blade-unicons/resources/svg/*.svg',
        'uiw' => '/vendor/codeat3/blade-uiw-icons/resources/svg/*.svg',
        'typ' => '/vendor/codeat3/blade-typicons/resources/svg/*.svg',
        'tni' => '/vendor/codeat3/blade-teeny-icons/resources/svg/*.svg',
        'tabler' => '/vendor/ryangjchandler/blade-tabler-icons/resources/svg/*.svg',
        'sui' => '/vendor/codeat3/blade-system-uicons/resources/svg/*.svg',
        'simpleline' => '/vendor/codeat3/blade-simple-line-icons/resources/svg/*.svg',
        'simpleicon' => '/vendor/ublabs/blade-simple-icons/resources/svg/*.svg',
        'rpg' => '/vendor/codeat3/blade-rpg-awesome-icons/resources/svg/*.svg',
        'ri' => '/vendor/andreiio/blade-remix-icon/resources/svg/*.svg',
        'radix' => '/vendor/codeat3/blade-radix-icons/resources/svg/*.svg',
        'prime' => '/vendor/codeat3/blade-prime-icons/resources/svg/*.svg',
        'pixelarticons' => '/vendor/codeat3/blade-pixelarticons/resources/svg/*.svg',
        'phosphor' => '/vendor/codeat3/blade-phosphor-icons/resources/svg/*.svg',
        'pepicon' => '/vendor/codeat3/blade-pepicons/resources/svg/*.svg',
        'monoicon' => '/vendor/codeat3/blade-mono-icons/resources/svg/*.svg',
        'microns' => '/vendor/codeat3/blade-microns/resources/svg/*.svg',
        'maki' => '/vendor/codeat3/blade-maki-icons/resources/svg/*.svg',
        'majestic' => '/vendor/codeat3/blade-majestic-icons/resources/svg/*.svg',
        'lucide' => '/vendor/mallardduck/blade-lucide-icons/resources/svg/*.svg',
        'lineawesome' => '/vendor/codeat3/blade-line-awesome-icons/resources/svg/*.svg',
        'jam' => '/vendor/codeat3/blade-jam-icons/resources/svg/*.svg',
        'ionicon' => '/vendor/faisal50x/blade-ionicons/resources/svg/*.svg',
        'ik' => '/vendor/codeat3/blade-ikonate/resources/svg/*.svg',
        'iconsax' => '/vendor/saade/blade-iconsax/resources/svg/*.svg',
        'iconoir' => '/vendor/andreiio/blade-iconoir/resources/svg/*.svg',
        'iconic' => '/vendor/itsmalikjones/blade-iconic/resources/svg/*.svg',
        'iconpark' => '/vendor/codeat3/blade-iconpark/resources/svg/*.svg',
        'icomoon' => '/vendor/nerdroid23/blade-icomoon/resources/svg/*.svg',
        'heroicon' => '/vendor/blade-ui-kit/blade-heroicons/resources/svg/*.svg',
        'healthicons' => '/vendor/troccoli/blade-health-icons/resources/svg/*.svg',
        'grommet' => '/vendor/codeat3/blade-grommet-icons/resources/svg/*.svg',
        'govicon' => '/vendor/codeat3/blade-govicons/resources/svg/*.svg',
        'gmdi' => '/vendor/codeat3/blade-google-material-design-icons/resources/svg/*.svg',
        'go' => '/vendor/actb/blade-github-octicons/resources/svg/*.svg',
        'forkawesome' => '/vendor/codeat3/blade-forkawesome/resources/svg/*.svg',
        'fontisto' => '/vendor/codeat3/blade-fontisto-icons/resources/svg/*.svg',
        'fas' => '/vendor/owenvoke/blade-fontawesome/resources/svg/*.svg',
        'fontaudio' => '/vendor/codeat3/blade-fontaudio/resources/svg/*.svg',
        'fluentui' => '/vendor/codeat3/blade-fluentui-system-icons/resources/svg/*.svg',
        'fileicon' => '/vendor/codeat3/blade-file-icons/resources/svg/*.svg',
        'feathericon' => '/vendor/brunocfalcao/blade-feather-icons/resources/svg/*.svg',
        'ei' => '/vendor/codeat3/blade-evil-icons/resources/svg/*.svg',
        'eva' => '/vendor/hasnayeen/blade-eva-icons/resources/svg/*.svg',
        'eos' => '/vendor/codeat3/blade-eos-icons/resources/svg/*.svg',
        'entypo' => '/vendor/owenvoke/blade-entypo/resources/svg/*.svg',
        'emblem' => '/vendor/codeat3/blade-emblemicons/resources/svg/*.svg',
        'elusive' => '/vendor/codeat3/blade-elusive-icons/resources/svg/*.svg',
        'devicon' => '/vendor/codeat3/blade-devicons/resources/svg/*.svg',
        'css' => '/vendor/khatabwedaa/blade-css-icons/resources/svg/*.svg',
        'cri' => '/vendor/codeat3/blade-cryptocurrency-icons/resources/svg/*.svg',
        'flag' => '/vendor/stijnvanouplines/blade-country-flags/resources/svg/*.svg',
        'cui' => '/vendor/ublabs/blade-coreui-icons/resources/svg/*.svg',
        'coolicon' => '/vendor/codeat3/blade-coolicons/resources/svg/*.svg',
        'clarity' => '/vendor/codeat3/blade-clarity-icons/resources/svg/*.svg',
        'carbon' => '/vendor/codeat3/blade-carbon-icons/resources/svg/*.svg',
        'bytesize' => '/vendor/codeat3/blade-bytesize-icons/resources/svg/*.svg',
        'bx' => '/vendor/mallardduck/blade-boxicons/resources/svg/*.svg',
        'bi' => '/vendor/davidhsianturi/blade-bootstrap-icons/resources/svg/*.svg',
        'antdesign' => '/vendor/codeat3/blade-ant-design-icons/resources/svg/*.svg',
        'akar' => '/vendor/codeat3/blade-akar-icons/resources/svg/*.svg',
        'academicon' => '/vendor/codeat3/blade-academicons/resources/svg/*.svg',
    ];
    /**
     * The partial field group.
     *
     * @return array
     */
    public function fields()
    {
        $iconOptions = [];
        foreach($this->iconPackages as $iconPackage => $iconPackagePath){

            $filesPath = get_theme_file_path() . $iconPackagePath;
            error_log(print_r([$filesPath],true), 3, '/var/tmp/my-errors.log');
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


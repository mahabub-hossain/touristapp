<?php
namespace App\Helpers;

class SystemHelper{

    public static function isActiveMenu($currentRoute,$menuArray){
        $links = [];
        $links[] = $menuArray['link'];
        if(is_array($menuArray['child']) && sizeof($menuArray['child'])>0){
            foreach ($menuArray['child'] as $layerTwo){
                $links[] = $layerTwo['link'];
                if(is_array($layerTwo['child']) && sizeof($layerTwo['child'])>0){
                    foreach ($layerTwo['child'] as $layerThree){
                        $links[] = $layerThree['link'];
                        if(is_array($layerThree['child']) && sizeof($layerThree['child'])>0){
                            foreach ($layerThree['child'] as $layerFour){
                                $links[] = $layerFour['link'];

                            }
                        }
                    }
                }
            }
        }
//return $links;
        if(in_array($currentRoute, $links)){
            return true;
        }else{
            return false;
        }
    }

}
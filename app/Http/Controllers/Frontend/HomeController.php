<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Harimayco\Menu\Facades\Menu;



use App\continent;
use App\country;
//use App\menu;
use App\offer;
use App\package;
use Illuminate\Http\Request;
use App\slider;
use App\touristspot;
use DB;


/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {




        $menuList = Menu::getByName('admin');
        //print_r($menuList);exit();

        //$menuList = DB::table('admin_menu_items')->get()->toArray();

//        $menues = ['cid' => [], 'parent' => []];
//        foreach ($menuList as $accountHead) {
//            $menues['cid'][$accountHead->id] = $accountHead;
//            $menues['parent'][$accountHead->parent][] = $accountHead->id;
//        }
//        //echo "<pre>";print_r($menues);die();
//        $html = $this->buildChartTree(0, $menues);
//        print_r($html);exit;

        $continetbycountry = DB::table('countries')->select('countries.id','name','continent_id','continentname','countries.slug')
                            ->leftJoin('continents','countries.continent_id','=','continents.id')
                             ->get()->toArray();
     //print_r($continetbycountry);exit;

        $newArr = [];
        foreach ($continetbycountry as $country){

            $newArr[$country->continentname][$country->id]['name'] = $country->name;
            $newArr[$country->continentname][$country->id]['slug'] = $country->slug;
        }

    //print_r($newArr);exit;
        $continents = continent::select('id', 'continentname','continentslug')->get();
        $offerspack = DB::table('packages')
            ->leftJoin('offers', 'offers.package_id', '=', 'packages.id')
            ->where('offers.ishighlightedoffer','=',1)
            ->take(6)
            ->get();
        $countriescount = country::select('id')->get();

        $sliderinfo = slider::all();
        $packagecount = package::select('id','packageimages')->get();

        //$menues = menu::select('id','menuname')->get();

//        $packagebycontinent = DB::select('SELECT t1.*
//                                            FROM(
//
//                                            SELECT 	con.id, con.continentname, p.id AS packageid, p.`packageimages`, p.`packagename`, p.`packageprice`
//                                            FROM `packages` AS p
//                                            LEFT JOIN `continents` AS con ON p.continentid = con.id
//                                            ORDER BY RAND()
//
//                                            ) AS t1
//                                            GROUP BY t1.id');


        // $packagebycontinent = DB::select('SELECT p.*
        //                                     FROM(

        //                                         SELECT 	p.id, p.packagename,p.`packageimages`, p.`packageprice`, p.`packageslug`, c.id as continentid,c.continentname
        //                                     FROM `continents` AS c
        //                                     LEFT JOIN `packages` AS p ON c.id = p.continentid


        //                                     ) AS p
        //                                     GROUP BY p.id limit 0,9');


         $packagebycontinent = DB::select('SELECT id, packagename, continentid, packageslug, packageprice, packageimages 
            FROM (SELECT c.id, c.packagename, c.continentid, c.packageslug,c.packageprice,c.packageimages, COUNT(1) AS relative_position_in_group 
            FROM packages c LEFT JOIN packages others ON c.continentid = others.continentid AND c.id <= others.id GROUP BY 1, 2) d WHERE relative_position_in_group <= 2');


        return view
        ('frontend.homemain.homecontent',
            compact('sliderinfo','countriescount','continents','offerspack',
                'packagecount7','packagecount','packagebycontinent','newArr','menuList'));


    }

//    public function buildChartTree($parent, $accounts)
//    {
////        $GLOBALS['iteration'] = 1;
////        $GLOBALS['iteration']++;
//        $html = "";
//        if (isset($accounts['parent'][$parent])) {
//            //echo "<pre>";print_r($accounts['parent'][$parent]);die();
//
////            if($GLOBALS['iteration']>1){
////                $html .= "<ul class ='dropdown-menu dropdown-menu-left'>";
////            }else{
////
////                //$html .= "<ul class =''>";
////                $html .= "<ul class ='nav navbar-nav navbar-right'>";
////            }
//            $html .= "";
//            foreach ($accounts['parent'][$parent] as $ca) {
//                //  echo "<pre>";print_r($ca);die();
//                if (!isset($accounts['parent'][$ca])) {
//                    $html .= "<li class='dropdown singleDrop'>" ."<a class='dropdown-toggle' data-toggle='dropdown' href='" . '/'. $accounts['cid'][$ca]->link . "'>" . $accounts['cid'][$ca]->label . "</a>" . "</li>";
//                }
//                if (isset($accounts['parent'][$ca])) {
//                    $html .= "<li class='dropdown singleDrop'>" . "<a style='color:white;' href='" . '/'. $accounts['cid'][$ca]->link . "'>" . $accounts['cid'][$ca]->label . "</a>";
//                    $html .= "<ul class='dropdown-menu dropdown-menu-left'>".$this->buildChartTree($ca, $accounts)."</ul>";
//
//                    $html .= "</li>";
//                }
//            }
//
//            $html .= "";
//
//        }
//        return $html;
//    }


}

<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Config;

class Helper
{
    public static function applClasses()
    {
        // default data value
        $dataDefault = [
            'mainLayoutType' => 'vertical-modern-menu',
            'pageHeader' => false,
            'bodyCustomClass' => '',
            'navbarLarge' => true,
            'navbarBgColor' => '',
            'isNavbarDark' => null,
            'isNavbarFixed' => true,
            'activeMenuColor' => '',
            'isMenuDark' => null,
            'isMenuCollapsed' => false,
            'activeMenuType' => '',
            'isFooterDark' => null,
            'isFooterFixed' => false,
            'templateTitle' => '',
            'defaultLanguage'=>'en',
            'largeScreenLogo' => 'images/logo/materialize-logo-color.png',
            'smallScreenLogo' => 'images/logo/materialize-logo.png',
            'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'),
        ];

        // if any key missing of array from custom.php file it will be merge and set a default value from dataDefault array and store in data variable
        $data = array_merge($dataDefault, config('custom.custom'));

        // all available option of materialize template
        $allOptions = [
            'mainLayoutType' => array('vertical-modern-menu', 'vertical-menu-nav-dark', 'vertical-gradient-menu', 'vertical-dark-menu', 'horizontal-menu'),
            'pageHeader' => array(true, false),
            'navbarLarge' => array(true, false),
            'isNavbarDark' => array(null, true, false),
            'isNavbarFixed' => array(true, false),
            'isMenuDark' => array(null, true, false),
            'isMenuCollapsed' => array(true, false),
            'activeMenuType' => array('sidenav-active-rounded'=>'sidenav-active-rounded','sidenav-active-square'=>'sidenav-active-square', 'sidenav-active-fullwidth'=>'sidenav-active-fullwidth'),
            'isFooterDark' => array(null, true, false),
            'isFooterFixed' => array(false, true),
            'defaultLanguage'=>array('en'=>'en','fr'=>'fr','de'=>'de','pt'=>'pt'),
            'direction' => array('ltr', 'rtl'),
        ];

        //if any options value empty or wrong in custom.php config file then set a default value
        foreach ($allOptions as $key => $value) {
            if (gettype($data[$key]) === gettype($dataDefault[$key])) {
                if (is_string($data[$key])) {
                    $result = array_search($data[$key], $value);
                    if (empty($result)) {
                        $data[$key] = $dataDefault[$key];
                    }
                }
            } else {
                if (is_string($dataDefault[$key])) {
                    $data[$key] = $dataDefault[$key];
                } elseif (is_bool($dataDefault[$key])) {
                    $data[$key] = $dataDefault[$key];
                } elseif (is_null($dataDefault[$key])) {
                    is_string($data[$key]) ? $data[$key] = $dataDefault[$key] : '';
                }
            }
        }

        // if any of template logo is not set or empty is set to default logo
        if (empty($data['largeScreenLogo'])) {
            $data['largeScreenLogo'] = $dataDefault['largeScreenLogo'];
        }
        if (empty($data['smallScreenLogo'])) {
            $data['smallScreenLogo'] = $dataDefault['smallScreenLogo'];
        }
        //mainLayoutTypeClass array contain default class of body element

        $mainLayoutTypeClass = [
            'vertical-modern-menu' => 'vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns',
            'vertical-menu-nav-dark' => 'vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-dark 2-columns',
            'vertical-gradient-menu' => 'vertical-layout page-header-light vertical-menu-collapsible vertical-gradient-menu 2-columns',
            'vertical-dark-menu' => 'vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 2-columns',
            'horizontal-menu' => 'horizontal-layout page-header-light horizontal-menu 2-columns',
        ];
        //sidenavMain array contain default class of sidenav
        $sidenavMain = [
            'vertical-modern-menu' => 'sidenav-main nav-expanded nav-lock nav-collapsible',
            'vertical-menu-nav-dark' => 'sidenav-main nav-expanded nav-lock nav-collapsible navbar-full',
            'vertical-gradient-menu' => 'sidenav-main nav-expanded nav-lock nav-collapsible gradient-45deg-deep-purple-blue sidenav-gradient ',
            'vertical-dark-menu' => 'sidenav-main nav-expanded nav-lock nav-collapsible',
            'horizontal-menu' => 'sidenav-main nav-expanded nav-lock nav-collapsible sidenav-fixed hide-on-large-only',
        ];
        //sidenavMainColor array contain sidenav menu's color class according to layout types
        $sidenavMainColor = [
            'vertical-modern-menu' => 'sidenav-light',
            'vertical-menu-nav-dark' => 'sidenav-light',
            'vertical-gradient-menu' => 'sidenav-dark',
            'vertical-dark-menu' => 'sidenav-dark',
            'horizontal-menu' => '',
        ];

        //activeMenuTypeClass array contain active menu class of sidenav according to layout types
        $activeMenuTypeClass = [
            'vertical-modern-menu' => 'sidenav-active-square',
            'vertical-menu-nav-dark' => 'sidenav-active-rounded',
            'vertical-gradient-menu' => 'sidenav-active-rounded',
            'vertical-dark-menu' => 'sidenav-active-rounded',
            'horizontal-menu' => '',
        ];

        //navbarMainClass array contain navbar's default classes
        $navbarMainClass = [
            'vertical-modern-menu' => 'navbar-main navbar-color nav-collapsible no-shadow nav-expanded sideNav-lock',
            'vertical-menu-nav-dark' => 'navbar-main navbar-color nav-collapsible sideNav-lock gradient-shadow',
            'vertical-gradient-menu' => 'navbar-main navbar-color nav-collapsible sideNav-lock',
            'vertical-dark-menu' => 'navbar-main navbar-color nav-collapsible sideNav-lock',
            'horizontal-menu' => 'navbar-main navbar-color nav-collapsible sideNav-lock',
        ];
        //navbarMainColor array contain navabar's color classes according to layout types
        $navbarMainColor = [
            'vertical-modern-menu' => 'navbar-dark gradient-45deg-indigo-purple',
            'vertical-menu-nav-dark' => 'navbar-dark gradient-45deg-purple-deep-orange',
            'vertical-gradient-menu' => 'navbar-light',
            'vertical-dark-menu' => 'navbar-light',
            'horizontal-menu' => 'navbar-dark gradient-45deg-light-blue-cyan',
        ];

        //navbarLargeColor array contain navbarlarge's default color classes
        $navbarLargeColor = [
            'vertical-modern-menu' => 'gradient-45deg-indigo-purple',
            'vertical-menu-nav-dark' => 'blue-grey lighten-5',
            'vertical-gradient-menu' => 'blue-grey lighten-5',
            'vertical-dark-menu' => 'blue-grey lighten-5',
            'horizontal-menu' => 'blue-grey lighten-5',
        ];

        //mainFooterClass array contain Footer's default classes
        $mainFooterClass = [
            'vertical-modern-menu' => 'page-footer footer gradient-shadow',
            'vertical-menu-nav-dark' => 'page-footer footer gradient-shadow',
            'vertical-gradient-menu' => 'page-footer footer',
            'vertical-dark-menu' => 'page-footer footer',
            'horizontal-menu' => 'page-footer footer gradient-shadow',
        ];

        //mainFooterColor array contain footer's color classes
        $mainFooterColor = [
            'vertical-modern-menu' => 'footer-dark gradient-45deg-indigo-purple',
            'vertical-menu-nav-dark' => 'footer-dark gradient-45deg-purple-deep-orange',
            'vertical-gradient-menu' => 'footer-light',
            'vertical-dark-menu' => 'footer-light',
            'horizontal-menu' => 'footer-dark gradient-45deg-light-blue-cyan',
        ];

        //  above arrary override through dynamic data
        $layoutClasses = [
            'mainLayoutType' => $data['mainLayoutType'],
            'mainLayoutTypeClass' => $mainLayoutTypeClass[$data['mainLayoutType']],
            'sidenavMain' => $sidenavMain[$data['mainLayoutType']],
            'navbarMainClass' => $navbarMainClass[$data['mainLayoutType']],
            'navbarMainColor' => $navbarMainColor[$data['mainLayoutType']],
            'pageHeader' => $data['pageHeader'],
            'bodyCustomClass' => $data['bodyCustomClass'],
            'navbarLarge' => $data['navbarLarge'],
            'navbarLargeColor' => $navbarLargeColor[$data['mainLayoutType']],
            'navbarBgColor' => $data['navbarBgColor'],
            'isNavbarDark' => $data['isNavbarDark'],
            'isNavbarFixed' => $data['isNavbarFixed'],
            'activeMenuColor' => $data['activeMenuColor'],
            'isMenuDark' => $data['isMenuDark'],
            'sidenavMainColor' => $sidenavMainColor[$data['mainLayoutType']],
            'isMenuCollapsed' => $data['isMenuCollapsed'],
            'activeMenuType' => $data['activeMenuType'],
            'activeMenuTypeClass' => $activeMenuTypeClass[$data['mainLayoutType']],
            'isFooterDark' => $data['isFooterDark'],
            'isFooterFixed' => $data['isFooterFixed'],
            'templateTitle' => $data['templateTitle'],
            'largeScreenLogo' => $data['largeScreenLogo'],
            'smallScreenLogo' => $data['smallScreenLogo'],
            'defaultLanguage'=>$allOptions['defaultLanguage'][$data['defaultLanguage']],
            'mainFooterClass' => $mainFooterClass[$data['mainLayoutType']],
            'mainFooterColor' => $mainFooterColor[$data['mainLayoutType']],
            'direction' => $data['direction'],
        ];
         // set default language if session hasn't locale value the set default language
         if(!session()->has('locale')){
            app()->setLocale($layoutClasses['defaultLanguage']);
        }
        return $layoutClasses;
    }
    // updatesPageConfig function override all configuration of custom.php file as page requirements.
    public static function updatePageConfig($pageConfigs)
    {
        $demo = 'custom';
        if (isset($pageConfigs)) {
            if (count($pageConfigs) > 0) {
                foreach ($pageConfigs as $config => $val) {
                    Config::set('custom.' . $demo . '.' . $config, $val);
                }
            }
        }
    }
}

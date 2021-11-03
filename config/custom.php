<?php
// custom.php file returd default configuration setting of layouts
// Changed by Yuris
return [
    'custom' => [
        'mainLayoutType' => 'vertical-modern-menu', //Options:vertical-modern-menu,vertical-menu-nav-dark,vertical-gradient-menu,vertical-dark-menu,horizontal-menu, default(vertical-modern-menu)
        'pageHeader' => false, //options:Boolean: false(default), true (Page Header for Breadcrumbs) Warning:if pageheader true need to define a breadcrums in controller
        'bodyCustomClass' => '', //any custom class can be pass
        'navbarLarge' => true, //options:[boolean]:true or false default(true)
        'navbarBgColor' => '', //Options: cyan,teal,light-blue,amber (any of materializecolor class can be pass). warning:if isNavbarDark set NavbarBgColor not work.
        'isNavbarDark' => null, //Options:True for dark, false for light and null for default (blank for default navbar background color according to theme)
        'isNavbarFixed' => true, // options:true or false
        'activeMenuColor' => '', //Sidebar active menu color (any of materializecolor class can be pass)
        'isMenuDark' => null, // True for dark, false for light and null for default(blank for default sidenav-color according to theme)
        'isMenuCollapsed' => false, // options:True or false  Warning:this option is not applicable for horizontal
        'activeMenuType' => '', //Options:default("") sidenav-active-square, sidenav-active-rounded, sidenav-active-fullwidth  Warning:this option is not applicable for horizontal
        'isFooterDark' => null, //True for dark, flase for light and null for default
        'isFooterFixed' => false, //options:true or false
        'templateTitle' => 'Portal', //template Title can be changes default('Materialize)
        'defaultLanguage' => 'en', //set your default language Options: en(default),pt,fr,de
        'largeScreenLogo' => 'images/logo/sono.png', //we used saparete log image for large screen and small
        'smallScreenLogo' => 'images/logo/sono.png', // pass the image path here e.g:'images/logo/materialize-logo-color.png' note:(Vertical-menu-nav-dark and horizontal-menu template used a single logo in both small and large screen)
#        'largeScreenLogo' => 'images/logo/materialize-logo-color.png', //we used saparete log image for large screen and small
#        'smallScreenLogo' => 'images/logo/materialize-logo.png', // pass the image path here e.g:'images/logo/materialize-logo-color.png' note:(Vertical-menu-nav-dark and horizontal-menu template used a single logo in both small and large screen)
        'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'),
    ],
];

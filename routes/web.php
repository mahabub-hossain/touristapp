<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController');

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {

    Route::get('/countrybycontinent/{continentslug}', 'homemainController@countrybycontinent');
    Route::get('/country/{slug}', 'homemainController@single');
    Route::get('/tourist-spot/{spotslug}', 'homemainController@singlespot');
    Route::get('/homemain/slidersearch/{min}/{max}', 'homemainController@slidersearch');
    Route::get('/homemain/offerslidersearch/{min}/{max}', 'homemainController@offerslidersearch');
    Route::get('/offerpackage/{offerslug}', 'homemainController@singelpackage');
    Route::get('/package/{packageslug}', 'homemainController@singelrealpackage');
    Route::get('/all-offerpackages', 'homemainController@viewallpackages');
    Route::get('/viewallcontinents', 'homemainController@viewallcontinents');
    Route::get('/allpackages', 'homemainController@allpackages');
    Route::get('/allcountries', 'homemainController@allcountries');
    Route::get('homemain/search/{id}', 'homemainController@search');
    Route::get('homemain/searchoffer/{id}', 'homemainController@searchoffer');
    Route::get('/winter-packages/', 'homemainController@winterpackage');
    Route::get('/homemain/map/', 'homemainController@mapshow');
    Route::resource('homemain', 'homemainController');

    Route::get('/filterpackage', 'homemainController@filterpackage');
    Route::resource('homecity', 'homecityController');

    include_route_files(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    Route::resource('continent', 'continentController');
    Route::get('/menu/createsubmenu', 'menuController@createsubmenu');
    Route::get('/menu/createdragmenu', 'menuController@createdragmenu');
    Route::post('/menu/storesubmenu', 'menucontroller@storesubmenu');
    Route::resource('menu', 'menucontroller');
    Route::get('country/deleteimage/{id}/{value}', 'countryController@deleteimage');
//    Route::get('/country/updateimage/{id}/{value}', 'countryController@updateimage');
    Route::resource('country', 'countryController');
    Route::resource('insertImage', 'imageController');
    Route::get('touristspot/findtouristcountry/{id}', 'toureguideController@findtouristcountry');
    Route::get('touristspot/findcities/{country}', 'toureguideController@findcities');
    Route::get('/touristspot/deleteimage/{id}/{value}', 'toureguideController@deleteimage');
    Route::resource('touristspot', 'toureguideController');


    Route::get('package/deleteimage/{id}/{value}', 'packageController@deleteimage');
    Route::get('package/findspots/{id}','packageController@findspots');
    Route::get('package/findcountry/{id}','packageController@findcountry');
    Route::resource('package', 'packageController');
    Route::resource('image', 'imageController');

    Route::resource('slider', 'sliderController');
    Route::resource('offers', 'offerController');




    include_route_files(__DIR__.'/backend/');
});

//Home Country


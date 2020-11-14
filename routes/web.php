<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
[
    'prefix'     => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function() {

    Auth::routes();

    Route::get('/', 'SiteController@index')->name('home');
    Route::redirect('/glavnaya', '/');
    Route::redirect('/glavnaya-stranitsa', '/');

    Route::get('kontakt', 'ContactController@contact')->name('contact');
    Route::post('send-message', 'ContactController@send_message')->name('send_message');
    
    Route::get('news/{slug?}', 'NewsController@reditect_news')->name('reditect_news');
    Route::get('uslugi/{slug?}', 'ServicesController@reditect_services')->name('reditect_services');
    Route::get('{slug}', 'PageController@redirect_page')->name('redirect_page');
    
    Route::group(['namespace' => 'Admin', 'prefix' => 'dashboard', 'middleware' => 'auth'], function() {
        Route::get('home', 'DashboardController@home')->name('home_page');
        Route::resources([
            'category'  => 'CategoryController',
            'setting'   => 'SettingController',
            'page'      => 'PageController',
            'post'      => 'PostController',
            'slider'    => 'SliderController',
            'partner'   => 'PartnerController'
        ]);
        Route::get('generate_slug', 'SlugController@create')->name('generate_slug');
        Route::get('remove_form_image', 'ImageController@remove')->name('remove_form_image');
        Route::get('change_pwd', 'UserController@change_pwd')->name('change_pwd');
        Route::post('change_pass', 'UserController@change_pass')->name('change_pass');
    });
    Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor_image_upload');;
});
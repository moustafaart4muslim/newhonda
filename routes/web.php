<?php

use Illuminate\Support\Facades\Route;

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

Route::get('test', function () {
    return view('test');
});
// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });



Route::group(['namespace' => 'App\Http\Controllers'], function () {
    //    Route::get('/', function () {
    //        return view('welcome');
    //    });
    Route::get(
        '/',
        [
            'as' => 'index',
            'uses' => 'SiteController@index'
        ]
    );
    Route::get(
        'about',
        [
            'as' => 'about',
            'uses' => 'SiteController@about'
        ]
    );
    Route::get(
        'ceo',
        [
            'as' => 'ceo',
            'uses' => 'SiteController@ceo'
        ]
    );
    Route::get(
        'environment',
        [
            'as' => 'environment',
            'uses' => 'SiteController@environment'
        ]
    );
    Route::get(
        'inspiration',
        [
            'as' => 'inspiration',
            'uses' => 'SiteController@inspiration'
        ]
    );
    Route::get(
        'events',
        [
            'as' => 'events',
            'uses' => 'SiteController@events'
        ]
    );
    Route::get(
        'fivestars',
        [
            'as' => 'fivestars',
            'uses' => 'SiteController@fivestars'
        ]
    );

    Route::get(
        'find-motocycles-dealer',
        [
            'as' => 'motocyclesdealer',
            'uses' => 'SiteController@motorDealer'
        ]
    );

    Route::get(
        'find-cars-dealer',
        [
            'as' => 'carsdealer',
            'uses' => 'SiteController@carsDealer'
        ]
    );

    Route::get(
        'locations',
        [
            'as' => 'locations',
            'uses' => 'SiteController@locations'
        ]
    );
    Route::get(
        'cars/{slug}/specs/{id}',
        [
            'as' => 'car',
            'uses' => 'SiteController@car'
        ]
    );

    Route::get(
        'motorcycles/{name}/{id}',
        [
            'as' => 'car',
            'uses' => 'SiteController@motorcycle'
        ]
    );

    Route::get(
        'motorcycles',
        [
            'as' => 'motorcycles',
            'uses' => 'SiteController@motorcycles'
        ]
    );

    Route::get(
        'car/{slug}/Specifications/{id}',
        [
            'as' => 'car-specifications',
            'uses' => 'SiteController@carSpecs'
        ]
    );

   Route::get(
        'cars/{slug}/{id}',
        [
            'as' => 'car',
            'uses' => 'SiteController@car'
        ]
    );


    /**Forms */
    
    Route::get(
        'recall',
        [
            'as' => 'recall',
            'uses' => 'FormsController@recall'
        ]
    );
    Route::post(
        'recall',
        [
            'as' => 'recall',
            'uses' => 'FormsController@postRecall'
        ]
    );

    Route::get(
        'contact/send',
        [
            'as' => 'contact',
            'uses' => 'FormsController@contact'
        ]
    );
    Route::post(
        'contact',
        [
            'as' => 'contact',
            'uses' => 'FormsController@postContact'
        ]
    );
    Route::get(
        'test-drive',
        [
            'as' => 'test-drive',
            'uses' => 'FormsController@testDrive'
        ]
    );
    Route::post(
        'test-drive',
        [
            'as' => 'post-test-drive',
            'uses' => 'FormsController@postTestDrive'
        ]
    );

    Route::get(
        'maintenance',
        [
            'as' => 'maintenance',
            'uses' => 'FormsController@maintenance'
        ]
    );
    Route::get(
        'maintenance',
        [
            'as' => 'maintenence',
            'uses' => 'FormsController@maintenance'
        ]
    );
    Route::post(
        'maintenance',
        [
            'as' => 'post-maintenance',
            'uses' => 'FormsController@postMaintenance'
        ]
    );
    // maintenance
    Route::get(
        'trade-in',
        [
            'as' => 'trade-in',
            'uses' => 'FormsController@tradeIn'
        ]
    );
    Route::post(
        'trade-in',
        [
            'as' => 'post-trade-in',
            'uses' => 'FormsController@postTradeIn'
        ]
    );
    
  
});

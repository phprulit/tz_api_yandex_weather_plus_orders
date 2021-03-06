<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'v1',
    'middleware' => 'api'
], function ($router) {
    Route::group([
        'namespace' => 'App\Http\Controllers'
    ], function () {
        Route::group([
            'prefix' => 'yandex',
            'namespace' => 'Yandex'
        ], function () {
            Route::get('set-weather', 'WeatherController@currentWeather');
        });
        Route::group([
            'prefix' => 'data',
            'namespace' => 'Data'
        ], function () {
            Route::get('get-partners-list', 'DataController@getPartnersList');
            Route::get('get-products-list', 'DataController@getProductsList');
        });
        Route::group([
            'prefix' => 'orders',
            'namespace' => 'Orders'
        ], function () {
            Route::get('get-list', 'HomeController@index');
            Route::get('get-order/{order_id}', 'EditController@order');
            Route::post('set-new-partner/{order}', 'EditController@editPartner');
            Route::post('edit-order/{order}', 'EditController@editOrder');
            Route::post('mails-order-completed/{order}', 'EditController@sendMailsAboutOrderCompleted');
            Route::post('add-item-in-order/{order}/{product_id}', 'EditController@addItemInOrder');
            Route::post('edit-quantity-item-order/{order}/{order_product}', 'EditController@editQuantityItem');
            Route::delete('destroy-item-order/{order}/{order_product_id}', 'EditController@destroyItemOrder');
        });
    });

});

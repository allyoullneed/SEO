<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['statamic.cp.authenticated'], 'namespace' => 'AllYouNeed\Seo\Http\Controllers'], function() {
    // Settings
    Route::get('/alt-design/alt-seo/', 'AltController@index')->name('alt-seo.index');
    Route::post('/alt-design/alt-seo/', 'AltController@update')->name('alt-seo.update');
});

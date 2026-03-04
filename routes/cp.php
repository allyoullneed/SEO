<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['statamic.cp.authenticated'], 'namespace' => 'AllYouNeed\Seo\Http\Controllers'], function() {
    // Settings
    Route::get('/seo', 'SeoController@index')->name('seo.index');
    Route::post('/seo', 'SeoController@update')->name('seo.update');
});

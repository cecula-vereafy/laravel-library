<?php


Route::group(['namespace' => 'Cecula\Vereafy'], function() {
    Route::post('twofactor/init', 'vereafyController@init');
    Route::post('twofactor/complete', 'vereafyController@complete');
    Route::post('twofactor/resend', 'vereafyController@resend');
    Route::get('account/tfabalance', 'vereafyController@balance');
});

<?php

Route::group(['middleware' => 'guest'], function () {
    Route::post('/register', 'Auth\RegisterController@create');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', [
        'uses' => 'Auth\LoginController@index',
    ]);
    Route::get('/logout', function (){
        Auth::logout();
    });
    Route::resource('contacts', 'ContactController');
});

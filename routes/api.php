<?php

Route::group(['middleware' => 'guest'], function () {
    Route::post('/register', 'Auth\RegisterController@create');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/user', [
        'uses' => 'Auth\LoginController@index',
    ]);
});

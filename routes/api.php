<?php

Route::group(['middleware' => 'guest'], function () {
    Route::post('/register', 'Auth\RegisterController@create');
});

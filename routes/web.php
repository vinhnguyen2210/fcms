<?php

Route::get('/', function () {
    return view('master');
});

Route::get('/export/{type}', 'ExportController@export');

Route::get('{path}', function () {
    return view('master');
})->where( 'path', '(.*)?' );

<?php

Route::get('/', function () {
    return view('master');
});

Route::get('{path}', function () {
    return view('master');
})->where( 'path', '(.*)?' );

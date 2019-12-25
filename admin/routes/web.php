<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::name('admin.')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/alumni', 'AdminController@alumni')->name('alumni');
});

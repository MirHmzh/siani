<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::name('admin.')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/alumni', 'AdminController@alumni')->name('alumni');
    Route::post('/alumni', 'AdminController@save_alumni')->name('alumni.save');
    Route::delete('/alumni', 'AdminController@delete_alumni')->name('alumni.delete');
    Route::post('/alumni/ubah', 'AdminController@update_alumni')->name('alumni.update');

    Route::get('/pengurus', 'AdminController@pengurus')->name('pengurus');
    Route::post('/pengurus', 'AdminController@save_pengurus')->name('pengurus.save');
    Route::delete('/pengurus', 'AdminController@delete_pengurus')->name('pengurus.delete');
    Route::post('/pengurus/ubah', 'AdminController@update_pengurus')->name('pengurus.update');
});

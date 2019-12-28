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

    Route::get('/agenda', 'AdminController@agenda')->name('agenda');
    Route::post('/agenda', 'AdminController@save_agenda')->name('agenda.save');
    Route::delete('/agenda', 'AdminController@delete_agenda')->name('agenda.delete');
    Route::post('/agenda/ubah', 'AdminController@update_agenda')->name('agenda.update');

    Route::get('/berita', 'AdminController@berita')->name('berita');
    Route::post('/berita', 'AdminController@save_berita')->name('berita.save');
    Route::delete('/berita', 'AdminController@delete_berita')->name('berita.delete');
    Route::post('/berita/ubah', 'AdminController@update_berita')->name('berita.update');

    Route::get('/galeri', 'AdminController@galeri')->name('galeri');
    Route::post('/galeri', 'AdminController@save_galeri')->name('galeri.save');
    Route::delete('/galeri', 'AdminController@delete_galeri')->name('galeri.delete');
    Route::post('/galeri/ubah', 'AdminController@update_galeri')->name('galeri.update');
});

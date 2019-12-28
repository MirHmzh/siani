<?php

use Illuminate\Http\Request;

Route::get('get_all_alumni', 'ApiController@get_all_alumni');
Route::get('get_all_pengurus', 'ApiController@get_all_pengurus');
Route::get('get_all_agenda', 'ApiController@get_all_agenda');
Route::get('get_all_berita', 'ApiController@get_all_berita');
Route::get('get_all_galeri', 'ApiController@get_all_galeri');

Route::get('get_alumni/{id}', 'ApiController@get_alumni');
Route::get('get_pengurus/{id}', 'ApiController@get_pengurus');
Route::get('get_agenda/{id}', 'ApiController@get_agenda');
Route::get('get_berita/{id}', 'ApiController@get_berita');
Route::get('get_galeri/{id}', 'ApiController@get_galeri');

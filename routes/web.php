<?php

use Illuminate\Support\Facades\Route;

Route::get('/asientos', 'AsientosController@index')->name('asientos.index');

Route::get('/', 'LoginController@show')->name('login.show');
Route::post('/', 'LoginController@verify')->name('login.verify');


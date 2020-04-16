<?php

use Illuminate\Support\Facades\Route;

Route::get('/asientos', 'AsientosController@index')->name('asientos.home');

Route::get('/', 'LoginController@show')->name('login.show');
Route::post('/', 'LoginController@verify')->name('login.verify');


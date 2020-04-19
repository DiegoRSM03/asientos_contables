<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');;

Route::view('/home', 'asientos')->name('home');

Route::get('/asientos', 'AsientosController@index')->name('asientos.index');
Route::get('/asientos/total', 'AsientosController@totalAsientos')->name('asientos.total');

Route::get('/accounts', 'AccountsController@index');

Route::get('/login', 'LoginController@show')->name('login.show');
Route::post('/login', 'LoginController@verify')->name('login.verify');


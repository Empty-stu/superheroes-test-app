<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SuperheroController@getHeroList');

Route::get('/create-superhero', 'SuperheroController@getCreateForm');

Route::post('/create-superhero', 'SuperheroController@createSuperhero');

Route::get('/hero/{id}', 'SuperheroController@getCompleteSuperheroInfo');

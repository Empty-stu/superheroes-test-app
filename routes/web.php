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

Route::get('/update/{id}', 'SuperheroController@getUpdateForm');

Route::post('/update/{id}', 'SuperheroController@updateSuperhero');

Route::get('/delete/{id}', 'SuperheroController@deleteSuperhero');

Route::get('/superpower/delete/{id}', 'SuperheroController@deleteSuperpower');

Route::get('/image/delete/{id}', 'SuperheroController@deleteImage');

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

Route::get('/', function () {
    return view('welcome');

});
//category
//editar contacto
Route::patch('/editc/{id}','ContactoController@edit')->name('editc');
//formulario categoria para editar
Route::get('/editformc/{id}','ContactoController@editform')->name('editformc');
//eliminar contacto
Route::delete('/deletec/{id}','ContactoController@delete')->name('deletec');
//listar contacto
Route::get('/listc','ContactoController@list');
//formulario contacto
Route::get('/formc', 'ContactoController@contactoform');
//guardar contacto
Route::post('/savec', 'ContactoController@save')->name('savec');

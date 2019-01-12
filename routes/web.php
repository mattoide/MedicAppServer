<?php

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
    //return view('welcome');
    return redirect('/pazienti');
});

Route::get('/pazienti', 'PazienteController@index');
Route::get('/diagnosi', 'DiagnosiController@index');
Route::get('/medicinali', 'MedicinaliController@index');
Route::get('/reminder', 'ReminderController@index');

Route::get('/nuovopaziente', 'PazienteController@create');
Route::post('/nuovopaziente', 'PazienteController@store');
Route::post('/eliminapaziente', 'PazienteController@delete');

Route::get('/nuovadiagnosi', 'DiagnosiController@create');
Route::post('/nuovadiagnosi', 'DiagnosiController@store');
Route::post('/modificadiagnosi', 'DiagnosiController@update');

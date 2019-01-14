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
Route::get('/medicinali', 'MedicinaleController@index');
Route::get('/reminder', 'ReminderController@index');

Route::get('/nuovopaziente', 'PazienteController@create');
Route::post('/nuovopaziente', 'PazienteController@store');
Route::get('/modificapaziente', 'PazienteController@edit');
Route::post('/modificapaziente', 'PazienteController@update');
Route::post('/eliminapaziente', 'PazienteController@delete');

Route::get('/nuovadiagnosi', 'DiagnosiController@create');
Route::post('/nuovadiagnosi', 'DiagnosiController@store');
Route::post('/modificadiagnosi', 'DiagnosiController@update');
Route::post('/eliminadiagnosi', 'DiagnosiController@delete');

Route::get('/nuovomedicinale', 'MedicinaleController@create');
Route::post('/nuovomedicinale', 'MedicinaleController@store');
Route::post('/modificamedicinale', 'MedicinaleController@update');
Route::post('/eliminamedicinale', 'MedicinaleController@delete');

Route::post('/aggiungistoriaclinica', 'PazienteController@createClinicStory');
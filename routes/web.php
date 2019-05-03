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
    return redirect('/login');
});


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

/********************************************************************************************************** */

Route::get('/pazienti', ['middleware' => 'auth', 'uses' =>'PazienteController@index']);
Route::get('/diagnosi', ['middleware' => 'auth', 'uses' =>'DiagnosiController@index']);
Route::get('/allergie', ['middleware' => 'auth', 'uses' =>'AllergiaController@index']);
Route::get('/medicinali', ['middleware' => 'auth', 'uses' =>'MedicinaleController@index']);
Route::get('/reminders', ['middleware' => 'auth', 'uses' =>'ReminderController@index']);
Route::get('/protocolli', ['middleware' => 'auth', 'uses' =>'ProtocolliController@index']);

Route::get('/nuovopaziente', ['middleware' => 'auth', 'uses' =>'PazienteController@create']);
Route::post('/nuovopaziente', ['middleware' => 'auth', 'uses' =>'PazienteController@store']);
Route::get('/modificapaziente', ['middleware' => 'auth', 'uses' =>'PazienteController@edit']);
Route::post('/modificapaziente', 'PazienteController@update');
Route::post('/eliminapaziente', 'PazienteController@delete');

Route::get('/nuovadiagnosi', ['middleware' => 'auth', 'uses' =>'DiagnosiController@create']);
Route::post('/nuovadiagnosi', 'DiagnosiController@store');
Route::post('/modificadiagnosi', 'DiagnosiController@update');
Route::post('/eliminadiagnosi', 'DiagnosiController@delete');

Route::get('/nuovaallergia', ['middleware' => 'auth', 'uses' =>'AllergiaController@create']);
Route::post('/nuovaallergia', 'AllergiaController@store');
Route::post('/modificaallergia', 'AllergiaController@update');
Route::post('/eliminaallergia', 'AllergiaController@delete');

Route::get('/nuovoreminder', ['middleware' => 'auth', 'uses' =>'ReminderController@create']);
Route::post('/nuovoreminder', 'ReminderController@store');
Route::post('/modificareminder', 'ReminderController@update');
Route::post('/eliminareminder', 'ReminderController@delete');

Route::get('/nuovomedicinale', ['middleware' => 'auth', 'uses' =>'MedicinaleController@create']);
Route::post('/nuovomedicinale', 'MedicinaleController@store');
Route::post('/modificamedicinale', 'MedicinaleController@update');
Route::post('/eliminamedicinale', 'MedicinaleController@delete');

Route::post('/nuovoprotocollo', 'ProtocolliController@store');
Route::post('/modificaprotocollo', 'ProtocolliController@update');
Route::post('/eliminaprotocollo', 'ProtocolliController@remove');


Route::post('/aggiungistoriaclinica', 'PazienteController@createClinicStory');
Route::post('/nuovaallergiapaziente', 'PazienteController@createAllergy');

Route::post('/getsiagnosibycategoria/{categoriadiagnosi}', 'DiagnosiController@getDiagnosiByCategoria');
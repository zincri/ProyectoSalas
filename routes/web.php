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
//Auth::routes();


//RUTAS DE AUTH Y USUARIOS
Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', function () {
    if(Auth::check()){
        return redirect('/');
    }
    return view('auth.login');
})->name('login');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::post('/logout','Auth\LoginController@logout')->name('logout');
Route::resource('registrar','Auth\RegistrarController');
Route::resource('usuarios','Admin\UsuariosController');
Route::get('resetpass','Admin\UsuariosController@resetpass')->name('resetpass');
Route::post('resetpass','Admin\UsuariosController@saveresetpass')->name('resetpass');
Route::get('resetpassuser/{id}','Admin\UsuariosController@resetpassuser')->name('resetpassuser');
Route::post('resetpassuser/{id}','Admin\UsuariosController@saveresetpassuser')->name('resetpassuser');


//RUTAS DE TOKENS
Route::resource('tokens','Admin\TonkensController');
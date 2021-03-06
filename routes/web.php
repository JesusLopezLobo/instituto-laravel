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

use App\incidenciaEntidad;


Route::get('/', function () {
    
    /*$incidencia = incidenciaEntidad::all();
    foreach ($incidencia as $value) {
        
        echo $value->descripcion."<br>";
        //echo $value->profesor."<br>";
        //var_dump($value->user->id);
        echo "<hr>";
    }

    die();*/
    
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Usuarios.
Route::get('/configuracion','UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get("/user/avatar/{filename}", "UserController@getImage")->name("user.avatar"); // routing hacia imagen (avatar).
Route::get('/list','UserController@list')->name('user.list');
Route::get('/user/delete/{id}', 'UserController@delete')->name('user.delete');
Route::get("/user/detalles/{id}", "UserController@detalles")->name("user.detalles");
//pdf.
Route::name('user.print')->get('/imprimirUser', 'UserController@imprimirPDF');

// Incidencias.
Route::get('/incidencias/create', 'IncidenciasController@create')->name('incidencias.create'); // Vista
Route::post('/incidencias/save', 'IncidenciasController@save')->name('incidencias.save');
Route::get('/incidencias/edit/{id}', 'IncidenciasController@edit')->name('incidencias.edit');
Route::post('/incidencias/update', 'IncidenciasController@update')->name('incidencias.update');
Route::get('/incidencias/delete/{id}', 'IncidenciasController@delete')->name('incidencias.delete');
Route::get('/incidencias/detalles/{id}', 'IncidenciasController@detalles')->name('incidencias.detalles');
//pdf.
Route::name('incidencias.print')->get('/imprimir', 'IncidenciasController@imprimirPDF');

// Logs.
Route::get('/logs/listado', 'logsController@list')->name('logs.listado');
Route::get('/logs/listadoIdAsc', 'logsController@ordenarLogsId')->name('logs.listadoIdAsc');
Route::get('/logs/listadoAccionAsc', 'logsController@ordenarLogsAccion')->name('logs.listadoAccion');
//pdf.
Route::name('logs.print')->get('/imprimirLogs', 'logsController@imprimirPDF');

// Mensajes.
Route::get('/mensajes/index/{id_enviar}', 'mensajesController@index')->name('mensajes');
Route::post('/mensajes/save', 'mensajesController@save')->name('mensajes.save');
Route::get('/mensajes/delete/{id}', 'mensajesController@delete')->name('mensajes.delete');
//pdf.
Route::name('mensaje.print')->get('/imprimirMensaje', 'mensajesController@imprimirPDF');




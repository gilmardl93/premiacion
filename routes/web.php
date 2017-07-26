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
    return view('welcome');
});

Route::get('logitos', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('login','HomeController@login');
Route::post('iniciar-sesion','HomeController@authenticate');

Route::group(['middleware' => 'auth'], function(){

    Route::get('logout','HomeController@logout');

    Route::get('/','AsistenciaController@index');
    Route::get('asistencia','AsistenciaController@index');
    Route::post('ingresar-asistencia','AsistenciaController@asistencia');

    Route::get('ingresantes','IngresanteController@index');
    Route::get('ingresantes-data','IngresanteController@data');
    Route::get('importar','IngresanteController@importar');
    Route::get('importar-ingresantes','IngresanteController@importaringresantes');

    Route::get('PDFAsistencia','ReportesController@PDFAsistencia')->name('PDFAsistencia');

    Route::get('sorteo','SorteoController@index');
    Route::get('sorteo-facultad','SorteoController@facultad');
    Route::get('sorteo-especialidad','SorteoController@especialidad');
    Route::get('sorteo-general','SorteoController@general');
    Route::post('sorteo-facultad-ingresante','SorteoController@sorteofacultad');
    Route::post('sorteo-especialidad-ingresante','SorteoController@sorteoespecialidad');
    Route::post('sorteo-general-ingresante','SorteoController@sorteogeneral');

    Route::get('diploma','DiplomaController@index');
    Route::get('PDFdiploma','ReportesController@PDFdiploma');

    Route::get('primeros-puestos','PuestosController@index');
    Route::post('registrar-primeros-puestos','PuestosController@registrar');

    Route::get('informacion','InformacionController@index');
    Route::post('actualizar-informacion','InformacionController@actualizar');

});



    Route::get('PDFsemibeca','BecaController@PDFSemibeca');
    Route::get('PDFintegral','BecaController@PDFintegral');
    Route::get('PDFdenegado','BecaController@PDFdenegado');
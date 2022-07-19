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


Route::group(['middleware' => ['cors']], function () {
    //Rutas a las que se permitirá acceso
    // CRUD BODEGAS
    Route::get('/bodegas','App\Http\Controllers\BodegaController@index');
    Route::post('/bodegas','App\Http\Controllers\BodegaController@store');
    Route::put('/bodegas/{id}','App\Http\Controllers\BodegaController@update');
    Route::delete('/bodegas/{id}','App\Http\Controllers\BodegaController@destroy');

    //
    Route::get('/marcas','App\Http\Controllers\MarcaController@index');
    //
    Route::get('/modelos','App\Http\Controllers\ModeloController@index');
    Route::get('/modelos/marca/{id}','App\Http\Controllers\ModeloController@show');
    //
    Route::get('/dispositivos','App\Http\Controllers\DispositivoController@index');
    Route::get('/dispositivos/modelo/{id}','App\Http\Controllers\DispositivoController@showByModelo');
    Route::get('/dispositivos/marca/{id}','App\Http\Controllers\DispositivoController@showByMarca');
    Route::get('/dispositivos/bodega/{id}','App\Http\Controllers\DispositivoController@showByBodega');

    Route::get('/dispositivo/{DIS_nombre}/{BOD_id}/{MOD_id}','App\Http\Controllers\DispositivoController@store');
    Route::post('/dispositivo/','App\Http\Controllers\DispositivoController@store2');

    // Recurso especifico para los combobox
    Route::get('/dispositivos/{bodega}/{marca}/{modelo}','App\Http\Controllers\DispositivoController@filterBy');
});










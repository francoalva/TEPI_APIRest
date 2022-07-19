<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

*/


Route::get('/bodegas','App\Http\Controllers\BodegaController@index');
Route::post('/bodegas','App\Http\Controllers\BodegaController@store');
Route::put('/bodegas/{id}','App\Http\Controllers\BodegaController@update');
Route::delete('/bodegas/{id}','App\Http\Controllers\BodegaController@destroy');


Route::group(['middleware' => ['cors']], function () {
    Route::post('/dispositivo/','App\Http\Controllers\DispositivoController@store2');
});

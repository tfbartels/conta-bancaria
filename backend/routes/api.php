<?php

use Illuminate\Http\Request;

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



Route::post('login', 'UserController@login');
Route::post('signup', 'UserController@signup');



Route::group(['middleware' => 'auth:api'], function(){
    Route::post('logout', 'UserController@logout');
    
    Route::get('agencia/{id}','AgenciaController@getAgencia');   
    Route::get('banco/{id}/agencias', 'BancoController@getAllAgencias');
    Route::get('agencia/{id}/contas', 'AgenciaController@getAllContas');    
    Route::get('contas','ContaController@getAllContas');
});


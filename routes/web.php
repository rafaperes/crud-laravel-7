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

Route::get('/', 'ProductsController@index')->name('/');

Route::prefix('produto')->group(function () {
    Route::get('/novo', 'ProductsController@create')->name('product.create');
    Route::post('/salvar', 'ProductsController@store')->name('product.store');
    Route::get('/editar/{id}', 'ProductsController@edit')->name('product.edit');
    Route::put('/atualizar/{id}', 'ProductsController@update')->name('product.update');
    Route::get('/deletar/{id}', 'ProductsController@destroy')->name('product.delete');
});
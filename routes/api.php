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

// rutas para Articulos
Route::get('articles', 'ArticleController@index');

Route::prefix('articles')->group(function () {
    Route::post('create', 'ArticleController@create');
    Route::put('edit/{id}', 'ArticleController@edit');
    Route::delete('{id}', 'ArticleController@delete');
    Route::get('{id}', 'ArticleController@search');
    Route::get('status/{status}', 'ArticleController@status');
});

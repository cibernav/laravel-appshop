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
/*
Route::get('/', function () {
    return view('welcome');
});*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'TestController@index');

Route::get('/product/{id}', 'ProductController@index'); //product info
Route::post('/cart', 'CartDetailController@store'); //save cart
Route::delete('/cart/delete/{id}', 'CartDetailController@destroy'); //delete cartdetail
Route::post('/order', 'CartController@update'); //generar pedido

Route::middleware(['auth', 'adminRol'])->prefix('admin')->namespace('Admin') ->group(function (){
    //CR
    Route::get('/product', 'ProductController@index'); //listar
    Route::get('/product/create', 'ProductController@create'); //form crear
    Route::post('/product', 'ProductController@store'); //guardar

    //U
    Route::get('/product/edit/{id}', 'ProductController@edit'); //form editar
    Route::post('/product/edit/{id}', 'ProductController@update'); //actualizar

    //D
    Route::get('/product/delete/{id}', 'ProductController@destroy'); //form eliminar
    Route::post('/product/delete/{id}', 'ProductController@destroy'); //form eliminar
    
    //Images
    Route::get('/product/image/{id}', 'ImageController@index'); //form eliminar
    Route::post('/product/image/{id}', 'ImageController@store'); //form eliminar
    Route::delete('/product/image/{id}', 'ImageController@destroy'); //form eliminar

    Route::get('/product/image/{id}/select/{image}', 'ImageController@select'); //form eliminar

    //Categoria
    //CR
    Route::get('/category', 'CategoryController@index'); //listar
    Route::get('/category/create', 'CategoryController@create'); //form crear
    Route::post('/category', 'CategoryController@store'); //guardar

    //U
    Route::get('/category/edit/{id}', 'CategoryController@edit'); //form editar
    Route::post('/category/edit/{id}', 'CategoryController@update'); //actualizar

    //D
    Route::get('/category/delete/{id}', 'CategoryController@destroy'); //form eliminar
    Route::post('/category/delete/{id}', 'CategoryController@destroy'); //form eliminar
});





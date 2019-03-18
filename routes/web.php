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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('show_course','Course_controler@show_course')->name('show_course');

Route::get('register_course','Course_controler@register_course')->name('register_course');

Route::get('edit_course/{id}','Course_controler@edit_course')->name('edit_course');

Route::put('update_course/{id}','Course_controler@update_course')->name('update_course');


Route::post('saving_course','Course_controler@saving_course')->name('saving_course');


Route::delete('delete_course/{id}','Course_controler@delete_course')->name('delete_course');

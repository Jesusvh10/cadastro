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

//Routes for modules Teachers

Route::get('show_teacher','Teacher_controller@show_teacher')->name('show_teacher');

Route::get('register_teacher','Teacher_controller@register_teacher')->name('register_teacher');

Route::post('saving_teacher','Teacher_controller@saving_teacher')->name('saving_teacher');

Route::get('edit_teacher/{id}','Teacher_controller@edit_teacher')->name('edit_teacher');

Route::put('update_teacher/{id}','Teacher_controller@update_teacher')->name('update_teacher');

Route::delete('delete_teacher/{id}','Teacher_controller@delete_teacher')->name('delete_teacher');




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


//Routes for modules Students

Route::get('show_student','Student_controller@show_student')->name('show_student');

Route::get('register_student','Student_controller@register_student')->name('register_student');

Route::post('saving_student','Student_controller@saving_student')->name('saving_student');

Route::get('edit_student/{id}','Student_controller@edit_student')->name('edit_student');

Route::put('update_student/{id}','Student_controller@update_student')->name('update_student');

Route::delete('delete_student/{id}','Student_controller@delete_student')->name('delete_student');



//Routes for module

Route::get('show_module','Mudule_controller@show_module')->name('show_module');

Route::get('register_module','Mudule_controller@register_module')->name('register_module');

Route::post('saving_module','Mudule_controller@saving_module')->name('saving_module');

Route::get('edit_module/{id}','Mudule_controller@edit_module')->name('edit_module');

Route::put('update_module/{id}','Mudule_controller@update_module')->name('update_module');

Route::delete('delete_module/{id}','Mudule_controller@delete_module')->name('delete_module');



// Routes for notes


Route::get('show_note','Note_controller@show_note')->name('show_note');

Route::get('register_note','Note_controller@register_note')->name('register_note');

Route::post('saving_note','Note_controller@saving_note')->name('saving_note');

Route::get('edit_note/{id}','Note_controller@edit_note')->name('edit_note');

Route::put('update_note/{id}','Note_controller@update_note')->name('update_note');

Route::delete('delete_note/{id}','Note_controller@delete_note')->name('delete_note');

// Routes for payments


Route::get('show_payment','Payment_controller@show_payment')->name('show_payment');

Route::get('register_payment','Payment_controller@register_payment')->name('register_payment');

Route::post('saving_payment','Payment_controller@saving_payment')->name('saving_payment');

Route::get('edit_payment/{id}','Payment_controller@edit_payment')->name('edit_payment');

Route::put('update_payment/{id}','Payment_controller@update_payment')->name('update_payment');

Route::delete('delete_payment/{id}','Payment_controller@delete_payment')->name('delete_payment');



// Routes for absences


Route::get('show_absence','Absences_controller@show_absence')->name('show_absence');

Route::get('register_absence','Absences_controller@register_absence')->name('register_absence');

Route::post('saving_absence','Absences_controller@saving_absence')->name('saving_absence');

Route::get('edit_absence/{id}','Absences_controller@edit_absence')->name('edit_absence');

Route::put('update_absence/{id}','Absences_controller@update_absence')->name('update_absence');

Route::delete('delete_absence/{id}','Absences_controller@delete_absence')->name('delete_absence');


//Routes for reports

Route::get('/report_payment','Reportpayments_controller@search')->name('search');
Route::get('/generatepdf','Reportpayments_controller@generatepdf')->name('generatepdf');


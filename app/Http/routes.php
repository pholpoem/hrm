<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'admin\PersonnelController@index');
Route::get('/personnel', 'admin\PersonnelController@index');
Route::get('/personnel/AddPersonnel', 'admin\PersonnelController@create');
Route::post('/personnel/AddPersonnel', 'admin\PersonnelController@store');
Route::get('/personnel/edit/{id}', 'admin\PersonnelController@edit');
Route::put('/personnel/edit/{id}', 'admin\PersonnelController@update');
Route::delete('/personnel/{id}', 'admin\PersonnelController@destroy');
Route::get('/get-position/{depart_id?}', 'admin\AjaxController@get_position');
Route::get('/get-amphur/{province_id?}', 'admin\AjaxController@get_amphur');
Route::get('/get-district/{amphur_id?}', 'admin\AjaxController@get_district');
Route::get('/get-zipcode/{amphur_id?}', 'admin\AjaxController@get_zipcode');


Route::get('/activity', function () {
    return view('admin.contents.activity');
});
Route::get('/admin', function () {
    return view('admin.contents.admin');
});
Route::get('/vacation', function () {
    return view('admin.contents.vacation');
});
Route::get('/calendar', function () {
    return view('admin.contents.calendar');
});
Route::get('/leav_online', function () {
    return view('admin.contents.leav_online');
});
Route::get('/messages', function () {
    return view('admin.contents.messages');
});
Route::get('/overtime', function () {
    return view('admin.contents.overtime');
});
Route::get('/department_position', 'admin\DepartmentController@index');
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
    return redirect(route('setting.index'));
});

Route::resource('get-tasks', 'GetTaskController');

Route::get('setting-tasks', 'SettingTaskController@index')->name('setting.index');
Route::post('setting-tasks', 'SettingTaskController@run')->name('setting.run');

// $ajax
Route::post('ajaxlang', 'SettingTaskController@GetAjaxLang')->name('ajaxlang.getajaxlang');

Route::post('ajaxhelpcity', 'SettingTaskController@AjaxHelpCity')->name('ajaxhelpcity.ajaxhelpcity');
Route::post('ajaxupdatetasks', 'SettingTaskController@AjaxUpdateTasks')->name('ajaxupdatetasks.ajaxupdatetasks');

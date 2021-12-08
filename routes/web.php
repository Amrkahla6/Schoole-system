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

Auth::routes();

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});


Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]], function(){ //...
    Route::get('/', function () {
        return view('dashboard');
    });
    // Dashboard
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::group(['namespace' => 'Dashboard'], function () {

        // Grade Routes
        Route::group(['namespace' => 'Grade'], function () {
            Route::resource('grades', 'GradeController')->except(['update']);
            Route::put('grades/update', 'GradeController@update')->name('grades.update');
        });


        // Class Rooms Routes
        Route::group(['namespace' => 'Classroom'], function () {
            Route::resource('classroom', 'ClassroomController')->except(['update','show']);
            Route::put('classroom/update', 'ClassroomController@update')->name('classroom.update');
            Route::delete('classroom/delete_all', 'ClassroomController@deleteAll')->name('classroom.delete_all');
            Route::get('classroom/filter-classes', 'ClassroomController@filterClasses')->name('classroom.filter_classes');
        });

    });
});



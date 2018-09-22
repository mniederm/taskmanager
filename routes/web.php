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

// Test ob die MongoDB Connection funktioniert
Route::get('mongo', function(Request $request) {
    $collection = Mongo::get()->test->inventory;
    return $collection->find()->toArray();
});
// Ende Test

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

// Create all routes for Tasks
Route::resource('tasks', 'TasksController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

use App\Events\TaskEvent;

Route::get('/', function () {
    return view('welcome');
});
//Broadcast::routes(['middleware' => ['auth:api']]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/broadcast', function () {

    //event(new TaskEvent('Hello this is task event message'));
    return view('broadcast');
})->name('broadcast');
Route::post('/broadcast', 'HomeController@broadcast')->name('broadcast_post');
Route::get('/listener', function () {

    return view('listener');
});


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

Route::post('/getFriends','HomeController@getFriends');
Route::post('/session/create','SessionController@create');
Route::post('/session/{session}/chats','ChatController@chats');
Route::post('/session/{session}/read','ChatController@read');
Route::post('/session/{session}/clear','ChatController@clear');
Route::post('/session/{session}/block','BlockController@block');
Route::post('/session/{session}/unblock','BlockController@unblock');



Route::post('/send/{session}','ChatController@send');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'HomeController@chat')->name('chat');

Route::get('/courses', 'CoursesController@index')->name('courses');




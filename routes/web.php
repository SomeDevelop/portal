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
//use Illuminate\Routing\Route;
//use Illuminate\Support\Facades\App;
//use Illuminate\Support\Facades\Config;
//use Session;
use Illuminate\Support\Facades\App;
Auth::routes();
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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'HomeController@chat')->name('chat');
Route::get('/publiccourses', 'CoursesController@show')->name('publiccourses');
Route::get('/lesson/{id}', 'LessonController@index');
Route::post('/favorite/{course}', 'CoursesController@favoriteCourse');
Route::post('/unfavorite/{course}', 'CoursesController@unFavoriteCourse');
Route::post('ajaxRequest', 'HomeController@ajaxRequest')->name('ajaxRequest');
Route::get('/category/{slug}', 'HomeController@category')->name('category.slug');



Route::middleware(['ability:Owner,Create'])->group(function (){

    Route::get('/course_lessons/{course}','LessonController@index')->name('course_lessons.course');
    Route::resource('lessons','LessonController');
    Route::resource('owner_courses','OwnerController');
    Route::get('/owner', 'OwnerController@courses')->name('owner');
    Route::get('/info', 'OwnerController@info')->name('info');

});
Route::middleware(['ability:Student,'])->group(function (){


    Route::get('/course/{course}', 'UsersController@openCourse')->name('course.course');
    Route::get('/my_favorites', 'UsersController@myFavorites');
    Route::get('/course_lesson/{lesson}', 'UsersController@openLesson')->name('course_lesson.lesson');
    Route::get('/student', 'UsersController@myFavorites')->name('student');
});

Route::middleware(['ability:Moderator,'])->group(function (){

    Route::get('/moderator/teachers', 'ModeratorController@index')->name('moderator');
    Route::get('/moderator/courses', 'ModeratorController@courses')->name('new-courses');
    Route::get('/moderator/comments', 'ModeratorController@comments')->name('new-comments');

});

Route::middleware(['ability:Admin,'])->group(function (){
    Route::resource('courses','CoursesController');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('categories','CategoryController');
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::resource('products','ProductController');
});


Route::get('/language/{locale}', 'LanguageController@changeLanguage')->name('language.locale');

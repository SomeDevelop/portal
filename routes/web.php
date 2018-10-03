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

Route::get('/', function () {
    return view('welcome');
})->name('main');
Auth::routes();
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
Route::get('/category/{slug}', 'CategoryController@category')->name('category.slug');
Route::get('/show_course/{slug}', 'HomeController@show')->name('show_course.slug');
Route::get('/author/{id}', 'ProfileController@show')->name('author.id');
Route::get('/authors', 'ProfileController@authors')->name('authors');




Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@store');
    Route::post('/comment', 'CommentsController@store');

});

Route::middleware(['ability:Owner,'])->group(function (){
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
    Route::get('/become', 'BecomeController@index')->name('become');
    Route::resource('student_courses','BecomeController');
    Route::get('/student_course/{slug}/show','UsersController@show_course')->name('student_course.slug');
    Route::resource('students_lessons','StudentsLessonController');


//    Route::get('/open_message/{$id}', 'UsersController@open_message')->name('open_message.id');




});

Route::middleware(['ability:Moderator,'])->group(function (){

    Route::get('/moderator/teachers', 'ModeratorController@index')->name('moderator');
    Route::get('/moderator/courses', 'ModeratorController@courses')->name('new-courses');
    Route::get('/moderator/comments', 'ModeratorController@comments')->name('new-comments');
    Route::get('/moderator/comments/toggle/{id}', 'CommentsController@toggle');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
    Route::get('/moderator/courses/toggle/{id}', 'CoursesController@toggle');
    Route::delete('/courses/{id}/destroy', 'CoursesController@destr')->name('courses.destr');
    Route::get('/moderator/show/{id}','ModeratorController@show')->name('moderator.show');
    Route::get('/message/{id}', 'ModeratorController@message')->name('message.id');
    Route::post('/moderator/message/{id}', 'ModeratorController@add_message')->name('moderator.message.id');



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

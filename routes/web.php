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



Route::middleware(['ability:Admin,Delete'])->group(function (){

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
});
//
//Route::get('setlocale/{locale}', function ($locale) {
//    if (in_array($locale, \Config::get('app.locales'))) {   # Проверяем, что у пользователя выбран доступный язык
//
//
//        $raw_locale = Session::get('locale');     # Если пользователь уже был на нашем сайте,
//        # то в сессии будет значение выбранного им языка.
//        dd($raw_locale);
//
//        if (in_array($raw_locale, Config::get('app.locales'))) {  # Проверяем, что у пользователя в сессии установлен доступный язык
//            $locale11 = $raw_locale;                                # (а не какая-нибудь бяка)
//        }                                                         # И присваиваем значение переменной $locale.
//        else $locale11 = Config::get('app.locale');                 # В ином случае присваиваем ей язык по умолчанию
//
//        App::setLocale($locale11);
//    }
//
//    return redirect()->back();                              # Редиректим его <s>взад</s> на ту же страницу
//});

//Route::group( ['prefix' => App::getLocale() ], function()
//{
//    Route::get('/', function(){
//
//        return 'Hi, your locale is '. App::getLocale();
//    });
//
//});

Route::get('setlocale/{locale}', 'LanguageController@changeLanguage');



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App;
use Lang;
class LanguageController extends Controller
{
//    public function changeLanguage($locale){
////        Session::put('locale', $locale);
//////        dd(session('locale'));
//////        return redirect()->back();
////
////
////        //set’s application’s locale
////        app()->setLocale($locale);
//////
//////        //Gets the translated message and displays it
////        echo __('messages.msg');
//////        return redirect()->back();
//    }
    /**
     * @param Request $request
     * @param $locale
     */
    public function changeLanguage($locale){
        if(in_array($locale, \Config::get('app.locales'))){
            Session::put('locale',$locale);

        }
//        dd(session('locale'));

        return redirect()->back();
    }
}

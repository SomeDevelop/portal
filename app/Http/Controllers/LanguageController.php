<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class LanguageController extends Controller
{
    public function changeLanguage($locale){
        Session::put('locale', $locale);
//        dd(session('locale'));
        return redirect()->back();
    }
}

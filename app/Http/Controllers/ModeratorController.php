<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function index(){


////        dd(Auth()->user()->getAuthIdentifier());
//        $courses = Course::orderBy('date', 'desc')->get()->where('user_id',Auth()->user()->getAuthIdentifier());
////        dd($courses);

        return view('moderator.index');
    }

    public function courses(){


////        dd(Auth()->user()->getAuthIdentifier());
//        $courses = Course::orderBy('date', 'desc')->get()->where('user_id',Auth()->user()->getAuthIdentifier());
////        dd($courses);

        return view('moderator.new_courses');
    }
    public function comments(){


////        dd(Auth()->user()->getAuthIdentifier());
//        $courses = Course::orderBy('date', 'desc')->get()->where('user_id',Auth()->user()->getAuthIdentifier());
////        dd($courses);

        return view('moderator.new_coments');
    }
}
<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function myFavorites()
    {

        $myFavorites = Auth::user()->favorites;
//        dd('3');
        return view('users.my_favorites', compact('myFavorites'));
    }

    public function openCourse($id)
    {
        $course = Course::find($id);

        return view('users.course', compact('course'));
    }
}

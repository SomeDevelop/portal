<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Course;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function index(){
        $courses = Course::latest()->paginate(10);

        $comments = Comment::latest()->paginate(10);
////        dd(Auth()->user()->getAuthIdentifier());
//        $courses = Course::orderBy('date', 'desc')->get()->where('user_id',Auth()->user()->getAuthIdentifier());
////        dd($courses);

        return view('moderator.index',['comments' => $comments, 'courses' => $courses]);
    }

    public function courses(){
        $courses = Course::latest()->paginate(10);
        $comments = Comment::latest()->paginate(10);
////        dd(Auth()->user()->getAuthIdentifier());
//        $courses = Course::orderBy('date', 'desc')->get()->where('user_id',Auth()->user()->getAuthIdentifier());
////        dd($courses);

        return view('moderator.new_courses',['comments' => $comments, 'courses' => $courses]);
    }
    public function comments(){
        $courses = Course::latest()->paginate(10);

        $comments = Comment::latest()->paginate(10);
//        dd($comments);
        return view('moderator.new_coments',['comments' => $comments, 'courses' => $courses]);
    }
}

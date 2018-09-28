<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function index(){

        $comments = Comment::latest()->paginate(10);
////        dd(Auth()->user()->getAuthIdentifier());
//        $courses = Course::orderBy('date', 'desc')->get()->where('user_id',Auth()->user()->getAuthIdentifier());
////        dd($courses);

        return view('moderator.index',['comments' => $comments]);
    }

    public function courses(){

        $comments = Comment::latest()->paginate(10);
////        dd(Auth()->user()->getAuthIdentifier());
//        $courses = Course::orderBy('date', 'desc')->get()->where('user_id',Auth()->user()->getAuthIdentifier());
////        dd($courses);

        return view('moderator.new_courses',['comments' => $comments]);
    }
    public function comments(){

        $comments = Comment::latest()->paginate(10);
//        dd($comments);
        return view('moderator.new_coments',['comments' => $comments]);
    }
}

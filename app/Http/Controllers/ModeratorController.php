<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Course;
use App\Lesson;
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

    public function show($id)
    {
        $courses = Course::latest();

        $comments = Comment::latest();
        $lessons = Lesson::all()->where('course_id',$id);

        $course = Course::find($id);
//        dd($course->title);


        return view('moderator.view_course', [
            'lessons'=>$lessons,
            'course' => $course,
            'courses' => $courses,
            'comments' => $comments,

        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use App\User;
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

        $lessons = Lesson::all()->where('course_id',$id);


        return view('users.course', ['course'=>$course, 'lessons'=>$lessons]);
    }
    public function openLesson($slug)
    {

        $lesson = Lesson::whereSlug($slug)->first();
        $course = Course::find($lesson->course_id);


        return view('users.lesson', ['lesson'=>$lesson, 'course'=>$course]);
    }
    public function toggle(Request $request)
    {
        $user = User::find($request->user_id);
        $data= auth()->user()->toggleFollow($user);
        return response()->json(['success'=>$data]);
    }
}

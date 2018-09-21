<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Lesson;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function myFavorites()
    {
        $categories = Category::all();
        $myFavorites = Auth::user()->favorites;
//        dd('3');
        return view('users.my_favorites', ['myFavorites'=>$myFavorites, 'categories' => $categories]);
    }

    public function openCourse($slug)
    {

        $course = Course::whereSlug($slug)->first();
//        dd($course);
        $categories = Category::all();

        $lessons = Lesson::all()->where('course_id',$course->id);

//        dd($lessons);
        return view('users.course', ['course'=>$course, 'lessons'=>$lessons, 'categories' => $categories]);
    }
    public function openLesson($slug)
    {
        $categories = Category::all();
        $lesson = Lesson::whereSlug($slug)->first();

        $course = Course::find($lesson->course_id);
//        dd($course);



        return view('users.lesson', ['lesson'=>$lesson, 'course'=>$course, 'categories' => $categories]);
    }
    public function toggle(Request $request)
    {
        $user = User::find($request->user_id);
        $data= auth()->user()->toggleFollow($user);
        return response()->json(['success'=>$data]);
    }
}

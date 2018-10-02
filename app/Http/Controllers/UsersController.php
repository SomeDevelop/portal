<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Lesson;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFollow\FollowRelation;

class UsersController extends Controller
{
    public function myFavorites()
    {
        $courses = Course::latest()->paginate(3);
        $populars = FollowRelation::popular('course')->paginate(3)->items();
        $categories = Category::all();
        $myFavorites = Auth::user()->favorites;
//        dd('3');
        return view('users.my_favorites', [
            'myFavorites'=>$myFavorites,
            'categories' => $categories,
            'populars' => $populars,
            'courses' => $courses
        ]);
    }

    public function openCourse($slug)
    {
        $courses = Course::latest()->paginate(3);
        $populars = FollowRelation::popular('course')->paginate(3)->items();
        $course = Course::whereSlug($slug)->first();
//        dd($course);
        $categories = Category::all();

        $lessons = Lesson::all()->where('course_id',$course->id);

//        dd($lessons);
        return view('users.course', [
            'course'=>$course,
            'lessons'=>$lessons,
            'categories' => $categories,
            'populars' => $populars,
            'courses' => $courses
        ]);
    }
    public function openLesson($slug)
    {
        $categories = Category::all();
        $lesson = Lesson::whereSlug($slug)->first();
        $courses = Course::latest()->paginate(3);
        $populars = FollowRelation::popular('course')->paginate(3)->items();
        $course = Course::find($lesson->course_id);
//        dd($course);



        return view('users.lesson', [
            'lesson'=>$lesson,
            'course'=>$course,
            'categories' => $categories,
            'populars' => $populars,
            'courses' => $courses
        ]);
    }
    public function toggle(Request $request)
    {
        $user = User::find($request->user_id);
        $data= auth()->user()->toggleFollow($user);
        return response()->json(['success'=>$data]);
    }

    public function open_message($id){
        dd($id);
    }
}

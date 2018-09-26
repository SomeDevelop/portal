<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Http\Resources\UserResource;
use App\Lesson;
use App\User;
use Illuminate\Http\Request;
use Overtrue\LaravelFollow\FollowRelation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return UserResource::collection(User::all());
        //return new UserResource(auth()->user());
        //return auth()->user();
        return view('home');
    }
    public function chat()
    {
//        return UserResource::collection(User::all());
        //return new UserResource(auth()->user());
        //return auth()->user();
        return view('chat');
    }

    public function show($slug)
    {
//                dd($slug);

        $course = Course::where('slug',$slug)->first();
        $courses = Course::latest()->paginate(3);
        $populars = FollowRelation::popular('course')->paginate(3)->items();
//dd($populars);
        $lessons = Lesson::all()->where('course_id',$course->id);
        $categories = Category::all();
//        return UserResource::collection(User::all());
        //return new UserResource(auth()->user());
        //return auth()->user();
        return view('pubcourses.view_course',[
            'course' => $course,
            'lessons' => $lessons,
            'categories' => $categories,
            'courses' => $courses,
            'populars' => $populars
        ]);
    }
    public function getFriends(){

        return UserResource::collection(User::where('id', '!=', auth()->id())->get());


    }

    public function ajaxRequest(Request $request){


        $post = Course::find($request->id);
        $response = auth()->user()->toggleLike($post);


        return response()->json(['success'=>$response]);
    }




}

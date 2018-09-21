<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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


    public function getFriends(){

        return UserResource::collection(User::where('id', '!=', auth()->id())->get());


    }

    public function ajaxRequest(Request $request){


        $post = Course::find($request->id);
        $response = auth()->user()->toggleLike($post);


        return response()->json(['success'=>$response]);
    }

    public function category($slug){
//        dd('jjj');
        $categories = Category::get();
        $category = Category::where('slug',$slug)->firstOrFail();
        $allcourses = Course::all();
        $courses = $category->courses()->where('status', 0)->paginate(6);
//        dd($courses);

        $cat = $category;
        return view('pubcourses.list',['courses' => $courses,'categories'=>$categories, 'cat' => $cat, 'allcourses' => $allcourses]);
    }


}

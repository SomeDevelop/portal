<?php

namespace App\Http\Controllers;

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
}

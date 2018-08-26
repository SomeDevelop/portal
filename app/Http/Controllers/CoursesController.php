<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
//        return UserResource::collection(User::all());
        //return new UserResource(auth()->user());
        //return auth()->user();
        return view('courses');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Overtrue\LaravelFollow\FollowRelation;

class ProfileController extends Controller
{
    public function index(){
        $courses = Course::latest()->paginate(3);
        $populars = FollowRelation::popular('course')->paginate(3)->items();
        $categories = Category::all();
        $user = Auth::user();
//        dd($user);

        return view('profile.index',[

            'categories' => $categories,
            'courses' => $courses,
            'populars' => $populars,
            'user' => $user,
        ]);
    }

    public function store(Request $request){
//        dd($request->get('password'));
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],

            'avatar' => 'nullable| mimes:jpeg,jpg,png | max:1000'
        ]);
        $user = Auth::user();
        $input = $request->only(['name', 'email']);
        $user->fill($input)->save();
        if($request->get('password') != null){

//            dd('dddd');
            $user->password = $request->get('password');
            $user->save();
        }

        $user->uploadAvatar($request->file('avatar'));

        return redirect()->back()->with('status', 'Профіль успішно оновлено');
    }
}
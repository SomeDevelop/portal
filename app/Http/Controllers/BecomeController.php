<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Http\Request;

class BecomeController extends Controller
{
    public function index(){
        $courses = Course::all()->where('user_id',Auth()->user()->getAuthIdentifier());
//        dd($courses);

        return view('become_teacher.become', ['courses'=>$courses]);

    }

    public function create()
    {

        $categories = Category::pluck('title', 'id')->all();
//        dd($categories);
//        $tags = Tag::pluck('title', 'id')->all();
        return view('become_teacher.create_course', compact(
            'categories'
//            ,'tags'
        ));
    }
    public function show(){
        $courses = Course::all()->where('user_id',Auth()->user()->getAuthIdentifier())->get();
        dd($courses);
        return view('become_teacher.become', ['courses'=>$courses]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required',
            'content'   =>  'required',
            'image' =>  'nullable|image'
        ]);
//        dd('111');
        $course = Course::add($request->all());
//        dd('Exelent');


        $course->uploadImage($request->file('image'));
        $course->setCategory($request->get('category_id'));
//        $course->setTags($request->get('tags'));
        $course->toggleStatus($request->get('status'));
        $course->toggleFeatured($request->get('is_featured'));
        $course->setIsFree($request->get('is_free'));
        flash('Курс '. $course->title.' успішно добавлено! ')->important();

        return redirect()->route('student_courses.index');
    }
}

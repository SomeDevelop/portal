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
    public function show($id){
        dd($id);
        $course = Course::find($id);
        dd($course);
        return view('become_teacher.become', ['course'=>$course]);
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

    public function edit($slug)
    {

        $course = Course::whereSlug($slug)->first();

        $categories = Category::pluck('title', 'id')->all();
//        dd($categories);

//        $tags = Tag::pluck('title', 'id')->all();
//        $selectedTags = $post->tags->pluck('id')->all();
        return view('become_teacher.edit', compact(
            'categories',
            'course'
//            'selectedTags'
        ));
    }
    public function update(Request $request, $slug)
    {
//        dd('6');
        $this->validate($request, [
            'title' =>'required',
            'content'   =>  'required',

            'image' =>  'nullable|image'
        ]);
        $course = Course::whereSlug($slug)->first();
        $course->edit($request->all());

        $course->uploadImage($request->file('image'));
        $course->setCategory($request->get('category_id'));
//        $post->setTags($request->get('tags'));
//        $course->toggleStatus($request->get('status'));


        flash('Курс '. $course->title.' успішно оновлено! ')->important();

        return redirect()->route('student_courses.index');
    }
//

    public function destroy($slug)
    {
        $course = Course::whereSlug($slug)->first();
//                dd($course);

        $course->remove();
        flash('Курс '. $course->title.' видалено! ')->important();

        return redirect()->route('student_courses.index');
    }
}

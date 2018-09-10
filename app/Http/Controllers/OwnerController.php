<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index(){


//        dd(Auth()->user()->getAuthIdentifier());
        $courses = Course::orderBy('date', 'desc')->get()->where('user_id',Auth()->user()->getAuthIdentifier());
//        dd($courses);

        return view('owner.mycourses',['courses'=>$courses]);
    }
    public function info(){
        return view('owner.info');
    }
    public function courses(){
        return view('owner.index');
    }
    public function show(){
        $courses = Course::all()->where('user_id',Auth()->user()->getAuthIdentifier())->paginate(6);
//        dd($courses);
        return view('owner.mycourses', ['courses'=>$courses]);
    }
    public function create()
    {

        $categories = Category::pluck('title', 'id')->all();
//        dd($categories);
//        $tags = Tag::pluck('title', 'id')->all();
        return view('owner.create_course', compact(
            'categories'
//            ,'tags'
        ));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required',
            'content'   =>  'required',
            'date'  =>  'required',
            'image' =>  'nullable|image'
        ]);

        $course = Course::add($request->all());
//        dd('tt2');


        $course->uploadImage($request->file('image'));
        $course->setCategory($request->get('category_id'));
//        $course->setTags($request->get('tags'));
        $course->toggleStatus($request->get('status'));
        $course->toggleFeatured($request->get('is_featured'));
        $course->setIsFree($request->get('is_free'));
        flash('Курс '. $course->title.' успішно добавлено! ')->important();

        return redirect()->route('owner_courses.index');
    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function edit($id)
    {
        $course = Course::find($id);
        $categories = Category::pluck('title', 'id')->all();
//        $tags = Tag::pluck('title', 'id')->all();
//        $selectedTags = $post->tags->pluck('id')->all();
        return view('owner.edit', compact(
            'categories',
            'course'
//            'selectedTags'
        ));
    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function update(Request $request, $id)
    {
//        dd('6');
        $this->validate($request, [
            'title' =>'required',
            'content'   =>  'required',
            'date'  =>  'required',
            'image' =>  'nullable|image'
        ]);
        $course = Course::find($id);
        $course->edit($request->all());

        $course->uploadImage($request->file('image'));
        $course->setCategory($request->get('category_id'));
//        $post->setTags($request->get('tags'));
        $course->toggleStatus($request->get('status'));
        $course->toggleFeatured($request->get('is_featured'));
        $course->setIsFree($request->get('is_free'));

        flash('Курс '. $course->title.' успішно оновлено! ')->important();

        return redirect()->route('owner_courses.index');
    }
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function destroy($id)
    {
//        dd('7');
        $course = Course::findOrFail($id);

        Course::find($id)->remove();
        flash('Курс '. $course->title.' видалено! ')->important();

        return redirect()->route('owner_courses.index');
    }

}

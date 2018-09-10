<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($id)
    {
//

        $lesson = Lesson::find($id);
        dd($lesson);

        return view('lesson.index', ['lesson'=>$lesson]);
    }
//    public function show(){
//        $courses = Course::orderBy('date', 'desc')->get();
////        dd($courses);
//        return view('pubcourses.index', ['courses'=>$courses]);
//    }
//    public function create()
//    {
//
//
//
//    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        $this->validate($request, [
//            'title' =>'required',
//            'content'   =>  'required',
//            'date'  =>  'required',
//            'image' =>  'nullable|image'
//        ]);
//        $course = Course::add($request->all());
//        $course->uploadImage($request->file('image'));
//        $course->setCategory($request->get('category_id'));
////        $course->setTags($request->get('tags'));
//        $course->toggleStatus($request->get('status'));
//        $course->toggleFeatured($request->get('is_featured'));
//        $course->setIsFree($request->get('is_free'));
//        return redirect()->route('courses.index');
//    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        $course = Course::find($id);
//        $categories = Category::pluck('title', 'id')->all();
////        $tags = Tag::pluck('title', 'id')->all();
////        $selectedTags = $post->tags->pluck('id')->all();
//        return view('courses.edit', compact(
//            'categories',
//            'course'
////            'selectedTags'
//        ));
//    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
//    {
//        $this->validate($request, [
//            'title' =>'required',
//            'content'   =>  'required',
//            'date'  =>  'required',
//            'image' =>  'nullable|image'
//        ]);
//        $course = Course::find($id);
//        $course->edit($request->all());
//        $course->uploadImage($request->file('image'));
//        $course->setCategory($request->get('category_id'));
////        $post->setTags($request->get('tags'));
//        $course->toggleStatus($request->get('status'));
//        $course->toggleFeatured($request->get('is_featured'));
//        $course->setIsFree($request->get('is_free'));
//        return redirect()->route('courses.index');
//    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        Course::find($id)->remove();
//        return redirect()->route('courses.index');
//    }
//    public function favoriteCourse(Course $course)
//    {
////        dd('1');
//        Auth::user()->favorites()->attach($course->id);
//        return back();
//    }
    /**
     * Unfavorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
}

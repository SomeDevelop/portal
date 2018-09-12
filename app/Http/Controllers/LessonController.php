<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($id)
    {
//$title = Category::find($this->category_id);
//        $course = Course::find($this->id);
//        dd($id);
        $lessons = Lesson::all()->where('course_id',$id);

        $course = Course::find($id);
//        dd($course);


        return view('owner.lesson.index', ['lessons'=>$lessons, 'course' => $course]);
    }
    public function show($slug){
//        dd($slug);
        $lesson = Lesson::whereSlug($slug)->first();
//        dd($lesson);
        return view('owner.lesson.show', ['lesson'=>$lesson]);
    }
    public function create(Request $request)
    {

        $course = Course::find($request->course);

//        $categories = Category::pluck('title', 'id')->all();
//        dd('999');
//        $tags = Tag::pluck('title', 'id')->all();
        return view('owner.lesson.create',['course'=>$course]);

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
            'description'  =>  'required'
        ]);
//        dd($request->all());
        $lesson = Lesson::add($request->all());
//
//        $course->setCategory($request->get('category_id'));
//        $course->setTags($request->get('tags'));
//        $course->toggleStatus($request->get('status'));
//        $course->toggleFeatured($request->get('is_featured'));
//        $course->setIsFree($request->get('is_free'));
        return redirect()->route('course_lessons.course',['course'=>$request->course_id]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $categories = Category::pluck('title', 'id')->all();
//        $tags = Tag::pluck('title', 'id')->all();
//        $selectedTags = $post->tags->pluck('id')->all();
        return view('courses.edit', compact(
            'categories',
            'course'
//            'selectedTags'
        ));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        return redirect()->route('courses.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->remove();
        return redirect()->route('courses.index');
    }
    public function favoriteCourse(Course $course)
    {
//        dd('1');
        Auth::user()->favorites()->attach($course->id);
        return back();
    }
    /**
     * Unfavorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
}

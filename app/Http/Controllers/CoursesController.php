<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index()
    {
//        return UserResource::collection(User::all());
        //return new UserResource(auth()->user());
        //return auth()->user();
        $courses = Course::all();
//        dd($courses);
        return view('courses.index', ['courses'=>$courses]);
    }
    public function show(){
        $courses = Course::paginate(6);
//        dd($courses);
        return view('pubcourses.index', ['courses'=>$courses]);
    }
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
//        dd($categories);
//        $tags = Tag::pluck('title', 'id')->all();

        return view('courses.create', compact(
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
        $course->uploadImage($request->file('image'));
        $course->setCategory($request->get('category_id'));
//        $course->setTags($request->get('tags'));
        $course->toggleStatus($request->get('status'));
        $course->toggleFeatured($request->get('is_featured'));
        $course->setIsFree($request->get('is_free'));
        return redirect()->route('courses.index');
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
    public function unFavoriteCourse(Course $course)
    {
        Auth::user()->favorites()->detach($course->id);

        return back();
    }
}

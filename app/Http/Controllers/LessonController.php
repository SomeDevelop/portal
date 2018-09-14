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
        $course = Course::find($lesson->course_id);

        return view('owner.lesson.show', ['lesson'=>$lesson, 'course'=>$course]);
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
//        dd($request);
        $dom = new \domdocument();
        $dom->loadHtml($request->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path() .'/img/lessons/'. $image_name;

            file_put_contents($path, $data);

            $img->removeattribute('src');
            $img->setattribute('src', '/img/lessons/'. $image_name);
        }

        $detail = $dom->savehtml();





        Lesson::add($request->all(),$detail);
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
    public function edit($slug)
    {
        $lesson = Lesson::whereSlug($slug)->first();

//        dd($lesson);
        return view('owner.lesson.edit', compact(
            'lesson'
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
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'title' =>'required',
            'description'   =>  'required',
            'content'   =>  'required'

        ]);
        $lesson = Lesson::whereSlug($slug)->first();
//
        $lesson->edit($request->all());
//        dd($lesson);
        return redirect()->route('course_lessons.course', ['course' => $lesson->course_id]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $lesson = Lesson::whereSlug($slug)->first();
//        dd('44');

        $lesson->remove();
        return redirect()->route('course_lessons.course', ['course' => $lesson->course_id]);

    }

}

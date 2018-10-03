<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Lesson extends Model
{
    use Sluggable;
    protected $fillable = ['title','description', 'content'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getCourseTitle()
    {
        $title = Course::find($this->course_id);
//        dd($title->title);
        return ($this->course_id != null)
            ?   $title->title
            :   'Без курса';
    }

    public static function add($fields, $detail)
    {
//        dd($fields["course_id"]);

        $lesson = new static;

        $lesson->fill($fields);
        $lesson->content = $detail;
        $course=Course::whereSlug($fields["course_slug"])->first();
//        dd($course->id);
        $lesson->course_id =$course->id;
        $lesson->save();
        return $lesson;
    }
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {

        $this->delete();
    }
}

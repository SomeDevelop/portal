<?php

namespace App\Models;

use App\Course;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Sluggable;
    protected $fillable =['title'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function courses(){
        return $this->belongsToMany(
            Course::class,
            'courses_tags',
            'tag_id',
            'course_id'

        );
    }

}

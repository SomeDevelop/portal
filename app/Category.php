<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['title'];
    use Sluggable;


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
//
//    public function posts(){
//        return $this->hasMany(Post::class);
//    }
}

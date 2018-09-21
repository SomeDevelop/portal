<?php

namespace App;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFollow\Traits\CanBeBookmarked;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanBeVoted;



class Course extends Model
{
    use CanBeLiked, Sluggable;
    const IS_DRAFT = 0;
    const IS_FREE = 0;
    const IS_PUBLIC = 1;
        protected $fillable = ['title','content', 'date'];
//    public function category()
//    {
//
//        return $this->belongsTo(Category::class);
//    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
//    public function comments()
//    {
//        return $this->hasMany(Comment::class);
//    }
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);

        $post->user_id = Auth()->user()->getAuthIdentifier();

        $post->save();
        return $post;
    }
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }
    public function removeImage()
    {
        if($this->image != null)
        {
            File::delete('uploads/' . $this->image);
            File::delete('uploads/200px/' . $this->image);
//            Storage::delete('uploads/' . $this->image);
//            Storage::delete('uploads/200px/' . $this->image);
        }
    }
    public function uploadImage($image)
    {
        if($image == null) { return; }
//        $this->removeImage();
//        $path = public_path(). '/uploads/';
//        $filename = time() . '.' . $image->getClientOriginalExtension();
//
//        $image->move($path, $filename);
//        dd($image->getRealPath());
//        $destinationPath = public_path(). '/200px/';
//        $img = Image::make($image->getRealPath());
//        $img->resize(100, 100, function ($constraint) {
//            $constraint->aspectRatio();
//        })->save($destinationPath.$filename);
//
////        $img->response();
////        $img->save($path.'$filename', 60);
////
        $this->removeImage();
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
//        $filename = $input['imagename'];
        $destinationPath = public_path('uploads/200px');
        $img = Image::make($image->getRealPath());
        $img->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
//        dd($img);
        $destinationPath = public_path('uploads');
        $image->move($destinationPath, $input['imagename']);
//        $this->postImage->add($input);
        $this->image = $input['imagename'];
        $this->save();
    }
    public function getFullImage()
    {
        if($this->image == null)
        {
            return '/img/no-image.png';
        }
//            dd($this->image);
        return '/uploads/' . $this->image;
    }
    public function getImage()
    {
        if($this->image == null)
        {
            return '/img/no-image.png';
        }
//            dd($this->image);
        return '/uploads/200px/' . $this->image;
    }
    public function setCategory($id)
    {
        if($id == null) {return;}
        $this->category_id = $id;
        $this->save();
    }
    public function setTags($ids)
    {
        if($ids == null){return;}
        $this->tags()->sync($ids);
    }
    public function setDraft()
    {
        $this->status = Course::IS_DRAFT;
        $this->save();
    }
    public function setFree()
    {
        $this->is_free = Course::IS_DRAFT;
        $this->save();
    }
    public function setNotFree()
    {
        $this->is_free = Course::IS_PUBLIC;
        $this->save();
    }
    public function setPublic()
    {
        $this->status = Course::IS_PUBLIC;
        $this->save();
    }
    public function toggleStatus($value)
    {
        if($value == null)
        {
            return $this->setDraft();
        }
        return $this->setPublic();
    }
    public function setFeatured()
    {
        $this->is_featured = 1;
        $this->save();
    }
    public function setIsFree($val)
    {
        if($val == null)
        {
            return $this->setFree();
        }
        return $this->setNotFree();
    }
    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }
    public function toggleFeatured($value)
    {
        if($value == null)
        {
            return $this->setStandart();
        }
        return $this->setFeatured();
    }
    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }
    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
        return $date;
    }
    public function getAuthorName(){
        $name = User::find($this->user_id);
        return ($this->category_id != null)
            ?   $name->name
            :   '--?';
    }
    public function getCategoryTitle()
    {
        $title = Category::find($this->category_id);
//        dd($title->title);
        return ($this->category_id != null)
            ?   $title->title
            :   'Без категорії';
    }
    public function getCategorySluge()
    {
        $slug = Category::find($this->category_id);
//        dd($slug->title);
        return ($this->category_id != null)
            ?   $slug->slug
            :   '________';
    }
    public function getTagsTitles()
    {
        return (!$this->tags->isEmpty())
            ?   implode(', ', $this->tags->pluck('title')->all())
            : 'Без тегів';
    }
    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }
    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }
    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }
    public function getPrevious()
    {
        $postID = $this->hasPrevious(); //ID
        return self::find($postID);
    }
    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }
    public function getNext()
    {
        $postID = $this->hasNext();
        return self::find($postID);
    }
    public function related()
    {
        return self::all()->except($this->id);
    }
    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }
    public static function getPopularPosts()
    {
        return self::orderBy('views','desc')->take(3)->get();
    }
    public function getComments()
    {
        return $this->comments()->where('status', 1)->get();
    }
    public function is_free(){
        return($this->is_free == 1) ? 'Платный' : 'Безплатний';
    }
    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
            ->where('course_id', $this->id)
            ->first();
    }
}

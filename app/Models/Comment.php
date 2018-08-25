<?php

namespace App\Models;

use App\Course;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function course(){
        return $this->hasOne(Course::class);
    }

    public function author(){
        return $this->hasOne(User::class);
    }

    public function allow(){ // разрешить пост
        $this->status = 1;
        $this->save();
    }

    public function disAllow(){
        $this->status = 0;
        $this->save();
    }

    public function toggleStatus(){

        if($this->status = 0){
            return $this->allow();
        }
        return $this->disAllow();
    }

    public function delete(){
        $this->delete();
    }
}

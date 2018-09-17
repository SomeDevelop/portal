<?php

namespace App;
use Illuminate\Support\Facades\Request;
use Overtrue\LaravelFollow\Traits\CanLike;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
//
{
//    use Notifiable;
    use EntrustUserTrait, CanLike;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    public function favorites()
    {
        return $this->belongsToMany(Course::class, 'favorites', 'user_id', 'course_id')->withTimeStamps();
    }
    public function toggle(Request $request)
    {
        $user = User::find($request->user_id);
        $data= auth()->user()->toggleFollow($user);
        return response()->json(['success'=>$data]);
    }
}

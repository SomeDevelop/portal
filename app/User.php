<?php

namespace App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Overtrue\LaravelFollow\Traits\CanLike;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


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


    public function edit($fields)
    {
        $this->fill($fields); //name,email

        $this->save();
    }

    public function generatePassword($password)
    {
        if($password != null)
        {
//            dd('password: '.$password);
//            $this->password = bcrypt($password);

            $this->save();
        }
    }

    public function uploadAvatar($image)
    {
        if($image == null) { return; }

        $this->removeAvatar();

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
//        $filename = $input['imagename'];
        $destinationPath = public_path('uploads/avatar/200px');
        $img = Image::make($image->getRealPath());
        $img->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        //        dd($img);

        $destinationPath = public_path('uploads/avatar');
        $image->move($destinationPath, $input['imagename']);

        $this->avatar = $input['imagename'];
        $this->save();
    }

    public function removeAvatar()
    {
        if($this->avatar != null)
        {
          File::delete('uploads/avatar/' . $this->avatar);
            File::delete('uploads/avatar/200px/' . $this->avatar);
        }
    }
    public function getAvatar(){

        if($this->avatar == null){
            return '/img/no-image.png';
        }
        return '/uploads/avatar/200px/' .$this->avatar;
    }
}

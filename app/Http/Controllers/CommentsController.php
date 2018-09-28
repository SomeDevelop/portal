<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request){
//dd($request->all());
        $this->validate($request,[
            'message' => 'required'
        ]);

        $comment = new Comment;
        $comment->text = $request->get('message');
        $comment->course_id = $request->get('course_id');
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->back()->with('status', 'Ваш комент буде скоро добавлений');
    }

    public function toggle($id){

        $comment = Comment::find($id);
        $comment->toggleStatus();

        return redirect()->back();
    }

    public function destroy($id){

        Comment::find($id)->remove();
        return redirect()->back();
    }
}

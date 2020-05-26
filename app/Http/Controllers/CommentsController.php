<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Content;
use App\Comment;

class CommentsController extends Controller
{
    //store
    public function store(Request $request)
    {
        $this->validate($request,[
            'comment' => 'required|max:191',
            ]);
            


        Comment::create([
            'user_id' => $request->user()->id,
            'content_id' => $request->content_id,
            'comment' => $request->comment,
            ]);

        return redirect()->back();
    }

    //show
     public function show($content_id)
    {
        $comment = Content::find($content_id);
        $user = User::where('id',$content->user_id())->first();

        return view('contents.show',compact('content','user'));
    }
    
}

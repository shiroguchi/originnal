<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()){
            $user = \Auth::user();
            $contents = $user->contents()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'contents' => $contents,
                ];
        }
        
        return view('welcome', $data);
    }
    
    //投稿表示
    public function show()
    {
       $data = [];
        if (\Auth::check()){
            $user = \Auth::user();
            $contents = $user->contents()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'contents' => $contents,
                ];
        }
        
        return view('users.show', $data); 
    }
    
    //投稿保存機能createメソッド使用
    public function store(Request $request)
    {
        $this->validate($request,[
            'booktitle' => 'required',
            'memo' => 'required|max:191',
        ]);
        
        $request->user()->contents()->create([
            'booktitle' => $request->booktitle,
            'memo' => $request->memo,
        ]);
        
        return back();
            
    }
    //投稿削除機能
    public function destroy($id)
    {
        $content = \App\Content::find($id);
        
        if (\Auth::id() === $content->user_id){
            $content->delete();
        }
        
        return back();
    }
    
    
}

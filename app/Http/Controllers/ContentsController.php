<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Content;

use App\User;


class ContentsController extends Controller
{ /*
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
    */
    
    //投稿表示
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
    
    //新規登録画面表示
    public function create(){
        $content = new Content;
        $user = \Auth::user();
        
        return view('contents.create', [
            'content' => $content, 
            'user' => $user,
        ]);
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
            'category' =>$request->category,
        ]);
        
        return redirect('/');
            
    }
    
    //contents/idにアクセスされたときの取得表示処理
    public function show($id)
    { 
        $content = Content::find($id);
        $user = $content->user;
        return view('contents.show', [
            'content' => $content,
            'user' =>$user,
        ]);
    }
    
    //contents/id/editにアクセスされた場合の更新処理画面表示
    public function edit($id)
    {
         $content = \App\Content::find($id);
         
        if(\Auth::id() === $content->user_id){
       $user = \Auth::user();
       
       return view('contents.edit',[
                'user' => $user,
                'content' => $content,
           ]);
        }else{
            return redirect ('/');
        }
    }
    
    //put patchでcontents/idにアクセスされた場合の更新処理
    public function update(Request $request, $id)
    {
       $content = Content::find($id);
       
        if(\Auth::id() === $content->user_id){
        $content->booktitle = $request->booktitle;
        $content->memo = $request->memo;
        $content->category = $request->category;
        $content->save();
       
       return redirect('/');
    }else{
       return redirect('/');
    }
    }
    //投稿削除機能
    public function destroy($id)
    {
        $content = \App\Content::find($id);
        
        if (\Auth::id() === $content->user_id){
            $content->delete();
        }
        
        return redirect('/');
    }
   /* 
    public function serch(Request $request)
    {
        #キーワード受け取り
        $keyword = $request->input('keyword');
        
        #クエリ作成
        $query = User::$query();
        
        #もしキーワードがあったら
        if(!empty($keyword))
        {
            $query->where('')
        }
    
    }
    */

    
  
}

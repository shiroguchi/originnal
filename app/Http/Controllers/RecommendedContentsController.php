<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecommendedContentsController extends Controller
{
     //おすすめ登録するメソッド（追加と削除）
    public function store(Request $request, $id)
    {
        \Auth::user()->recommend($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unrecommend($id);
        return back();
    }
}

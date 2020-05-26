<?php

namespace App\Http\Controllers;
//Illuminate\Http\Request;から変更↓
use Request;
//use Illuminate\Http\Request;

use App\Content;

use View;

use App\User;

class SerchController extends Controller
{	/*
    public function index(){
        $contents = Content::paginate(10);
        
        return view('serch.index')->with('contents', $contents);
    }
    */
    public function getSearch(){
	$query = Request::get('q');

	if ($query) {
		$contents = Content::where('booktitle', 'LIKE', "%$query%")->orWhere('memo', 'LIKE', "%$query%")->orWhere('category',$query)->paginate(10);
	}else{
		$contents = Content::paginate(10);
	}

	return View::make('serch.index')->with('contents', $contents);
}

    public function serchCategory(Request $request){
    /*	$query = User::query();
    	$search2 = $request->input('category');
    	if ($request->has('category') && $search2 != ('カテなし')) {
            $query->where('category', $search2)->get();
        }else{
		$contents = Content::paginate(10);
	}
    return View::make('serch.index')->with('contents', $contents);*/
}
}
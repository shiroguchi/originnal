<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{  /*
    public function show($id)
    {
        $user = User::find($id);
        
        return view('users.show',[
            'user' => $user,
            ]);
    }
    */
    
    public function show($id)
    {
            $user = User::find($id);
            $contents = $user->contents()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'contents' => $contents,
            ];
       
        return view('users.index', $data);
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'favorites' => $favorites,
        ];
        
        return view('users.favorites', $data);
    }
    
    public function recommends($id)
    {
        $user = User::find($id);
        $recommends = $user->recommends()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'recommends' => $recommends,
        ];
        
        return view('users.recommends', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){
        $auth_id = Auth::id();
        $followings = DB::table('follows')
        ->where('follower',Auth::id())
        ->get();
        if (request('search')) {
            $search = $request->input('search');
            $users = DB::table('users')
            ->where('username','like',"%{$search}%")
            ->get();
        }else{
            $users = DB::table('users')->get();
        }

        return view('users.search',compact('users','followings','auth_id'));
    }
}

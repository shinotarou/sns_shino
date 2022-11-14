<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){
        $users = DB::table('users')->get();

        if (request('search')) {
            $search = $request->input('search');
            $users = DB::table('users')
            ->where('username','like',"%{$search}%")
            ->get();
        }

        return view('users.search',compact('users'));
    }
}

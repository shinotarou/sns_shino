<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
    public function create(Request $request){
        $id = $request->input('id');
        DB::table('follows')
        ->insert([
            'follow' => $id,
            'follower' => Auth::id(),
            'created_at' => now(),
        ]);
        return back();
    }
    public function delete(Request $request){
        $id = $request->input('id');
        DB::table('follows')
        ->where([
            'follow' => $id,
            'follower' => Auth::id(),
        ])->delete();

        return back();
    }
}

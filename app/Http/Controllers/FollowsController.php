<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class FollowsController extends Controller
{
    //
    public function followList(){
        $follows = DB::table('follows')
        ->join('users','follows.follow','=','users.id')
        ->Leftjoin('posts','follows.follow','=','posts.user_id')
        ->where('follows.follower',Auth::id())
        ->select('users.username','users.images','posts.posts')
        ->get();
        // dd($follows);
        return view('follows.followList',compact('follows'));
    }
    public function followerList(){
        $followers = DB::table('follows')
        ->join('users','follows.follower','=','users.id')
        ->Leftjoin('posts','follows.follower','=','posts.user_id')
        ->where('follows.follow',Auth::id())
        ->select('users.username','users.images','posts.posts')
        ->get();
        // dd($followers);
        return view('follows.followerList',compact('followers'));
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

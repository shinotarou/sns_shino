<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->leftJoin('follows','posts.user_id','=','follows.follow')
        ->where('users.id',Auth::id())
        ->orWhere('follows.follower',Auth::id())
        ->select('users.images','users.username','posts.posts','posts.created_at as created_at')
        ->get();

        return view('posts.index',compact('posts'));
    }

    public function tweet(Request $request){
        $tweet = $request->input('tweet');

        DB::table('posts')->insert([
            'posts' => $tweet,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => null,
        ]);

        return back();
    }
}

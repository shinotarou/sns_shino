<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;

class UsersController extends Controller
{
    public function myprofile(){
        $myprofiles = DB::table('users')
        ->where('id',Auth::id())
        ->first();
        return view('users.myprofile',compact('myprofiles'));
    }
    public function profile($user){
        $bios = DB::table('users')
            ->where('users.id', $user)
            ->select('users.id', 'users.username', 'users.images', 'bio')
            ->first();

        $following = DB::table('follows')
        ->where('follower',Auth::id())
        ->where('follow', $user)
        ->get();

        $posts = DB::table('posts')
        ->where('user_id',$user)
        ->get();
// dd('a');
        return view('users.profile',compact('bios','following','posts'));
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

    public function newprofile(Request $request){
        $new_username = $request->input('new_username');
        $new_mail=$request->input('new_mail');
        $new_password = $request->input('new_password');
        $new_bio = $request->input('new_bio');
        $new_image = $request->file('file');

        DB::table('users')
        ->where('id',Auth::id())
        ->update([
            'username' => $new_username,
            'mail' => $new_mail,
            'bio' => $new_bio
        ]);

        if(isset($new_image)){
            $file_name = $request->file('file')->getClientOriginalName();

            DB::table('users')
            ->where('id',Auth::id())
            ->update([
                    'images' =>$file_name
                    ]);
            $request->file('file')->storeAs('images',$file_name, 'public_uploads');
        }else{

        };

        if(isset($new_password)){
            DB::table('users')
                ->where('id',Auth::id())
                ->update([
                    'password' => Hash::make($new_password)
            ]);
        }else{

        };

        return back();
    }
}

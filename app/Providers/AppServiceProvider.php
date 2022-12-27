<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use View;
use DB;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $auth)
    {
        view()->composer('*', function($view) use ($auth) {
            $user = DB::table('users')
            ->where('id',Auth::id())
            ->first();

            $follow_count = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();

            $follower_count = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();

            View::share('user', $user);

            View::share('follow_count', $follow_count);

            View::share('follower_count', $follower_count);
        });
    }
}

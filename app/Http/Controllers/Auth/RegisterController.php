<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:4|max:255',
            'mail' => 'required|string|email|min:4|max:255|unique:users',
            'password' => 'required|string|alpha_num|min:4|max:12|confirmed',
            'password_confirmation' => 'required|string|alpha_num|min:4|max:12',
        ],[
            'username.required' => '名前は必須です。',
            'username.min' => '名前は4文字以上です。',
            'username.max' => '名前は255文字以下です。',
            'mail.required' => 'メールアドレスは必須です。',
            'mail.email' => 'メールアドレスの形式が違います。',
            'mail.min' => 'メールアドレスは4文字以上です。',
            'mail.max' => 'メールアドレスは255文字以下です。',
            'mail.unique' => 'このメールアドレスはすでに登録してあります',
            'password.required' => 'パスワードは必須です。',
            'password.alpha_num' => 'パスワードは英数字です。',
            'password.min' => 'パスワードは4文字以上です。',
            'password.max' => 'パスワードは12文字以下です。',
            'password.confirmed' => 'パスワードと一致してません',
            'password_confirmation.required' => '入力してください。',


        ])->validate();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
// バリデーター関数をここ入れる。入れ方は下の＄thisと同じ。
            $this->validator($data);
            $this->create($data);
            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}

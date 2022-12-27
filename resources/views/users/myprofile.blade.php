@extends('layouts.login')

@section('content')


<form action="/newprofile" method="post" enctype="multipart/form-data">
 @csrf
 <img src="{{ asset('images/'.$myprofiles->images) }}" alt="" style="width:100px;height:auto;"><br>
 UserName
 <input type='text' name="new_username" value='{{$myprofiles->username}}'><br>
 MailAdress
 <input type='text' name='new_mail' value='{{$myprofiles->mail}}'><br>
 PassWord
 <input type='password' value="{{$myprofiles->password}}" readonly><br>
 new PassWord
 <input type='password' name='new_password'><br>
 Bio
 <input type='text' name='new_bio' value="{{$myprofiles->bio}}"><br>
 Icon Image
 <input type='file' name='file'><br>
 <input type='submit' name='' value='更新'>

</form>

@endsection

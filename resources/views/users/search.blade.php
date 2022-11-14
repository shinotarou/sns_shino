@extends('layouts.login')

@section('content')

<form action="/search" method="get">
  @csrf
  <input type="text" name="search" max="150" placeholder="ユーザー名">
  <input type="submit" value="検索">
</form>

@foreach($users as $user)
  <div>
  <p><img src="{{ asset('images/dawn.png')}}">
  {{$user->username}}</p>
  </div>
@endforeach


@endsection

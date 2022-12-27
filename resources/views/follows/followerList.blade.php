@extends('layouts.login')

@section('content')

<div class="follow-frame">
  @foreach($followers->unique('id') as $follower)
    <a href = "/profile/{{$follower->id}}">
      <img src="{{ asset('images/'.$follower->images) }}" style="width:100px;height:auto;" alt="">
    </a>
  @endforeach
</div>


@foreach($followers as $follower)
  <div class="tweet-frame">
    <a href = "/profile/{{$follower->id}}">
      <img src="{{ asset('images/'.$follower->images) }}" style="width:100px;height:auto;" alt="">
    <p>{{$follower->posts}}</p>
    <p>{{$follower->username}}</p>
  </div>
@endforeach

@endsection

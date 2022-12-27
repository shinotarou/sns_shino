@extends('layouts.login')

@section('content')

<div class="follow-frame">
  @foreach($follows->unique('id') as $follow)
    <a href = "/profile/{{$follow->id}}">
      <img src="{{ asset('images/'.$follow->images) }}" style="width:100px;height:auto;" alt="">
    </a>
  @endforeach
</div>


@foreach($follows as $follow)
  <div class="tweet-frame">
    <a href = "/profile/{{$follow->id}}">
      <img src="{{ asset('images/'.$follow->images) }}" style="width:100px;height:auto;" alt="">
    </a>
    <p>{{$follow->posts}}</p>
    <p>{{$follow->username}}</p>
  </div>
@endforeach

@endsection

@extends('layouts.login')

@section('content')

<form action="/tweet" method="post">
  @csrf
  <input type="text" name="tweet" max="150" placeholder="何をつぶやこうかな...">
  <input type="submit" value="投稿">
</form>

@foreach($posts as $post)
<div class="tweet-frame">
    <img src="{{ asset( 'images/'.$post->images )}}" style="width:100px;height:auto;">
    {{$post->username}}<br><br>
    {{$post->posts}}<br>
    {{$post->created_at}}<br><br>
</div>
@endforeach

@endsection

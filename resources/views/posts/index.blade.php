@extends('layouts.login')

@section('content')

<form action="/tweet" method="post">
  @csrf
  <input type="text" name="tweet" max="150" placeholder="何をつぶやこうかな...">
  <input type="submit" value="投稿">
</form>


@foreach($posts as $post)
{{$post->username}}
{{$post->posts}}
{{$post->created_at}}
@endforeach

@endsection

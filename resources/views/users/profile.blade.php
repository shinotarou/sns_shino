@extends('layouts.login')

@section('content')

<img src="{{ asset('images/'.$bios->images) }}" style="width:100px;height:auto;" alt=""><br>
Name {{$bios->username}}<br>
bio {{$bios->bio}}<br>

@if($following->contains('follow',$bios->id))
     <form action="/follow/delete" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $bios->id }}">
        <input type="submit" value="フォローをはずす">
      </form>
@else
      <form action="/follow/create" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $bios->id }}">
        <input type="submit" value="フォローする">
      </form>
@endif

@if(isset($posts))
    @foreach($posts as $post)
        {{$post->posts}}
    @endforeach
@else

@endif

@endsection

@extends('layouts.login')

@section('content')

@foreach($followers as $follower)
<a href = "/profile"><img src="{{ asset('images/'.$follower->images) }}" alt="">

@endforeach

@foreach($followers as $follower)
{{$follower->posts}}
{{$follower->username}}

@endforeach

@endsection

@extends('layouts.login')

@section('content')

@foreach($follows as $follow)
<a href = "/profile"><img src="{{ asset('images/'.$follow->images) }}" alt="">

@endforeach

@foreach($follows as $follow)
{{$follow->posts}}
{{$follow->username}}

@endforeach

@endsection

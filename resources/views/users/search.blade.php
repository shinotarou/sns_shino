@extends('layouts.login')

@section('content')

<form action="/search" method="get">
  @csrf
  <input type="text" name="search" max="150" placeholder="ユーザー名">
  <input type="submit" value="検索">
</form>

@foreach($users as $user)
  <div>
    <p><img src="{{ asset('images/'.$user->images)}}" style="width:100px;height:auto;">
    {{$user->username}}</p>
    @if($auth_id != $user->id)
      @if($followings->contains('follow',$user->id))
      <form action="follow/delete" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$user->id}}">
          <input type="submit" value="フォローをはずす">
        </form>
      @else
        <form action="/follow/create" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$user->id}}">
          <input type="submit" value="フォローする">
      </form>
      @endif
  </div>
@else
      <!-- なにも表示させない処理 -->
@endif
@endforeach


@endsection

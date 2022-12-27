@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<div class=frame>
  <h2>新規ユーザー登録</h2><br>

  {{ Form::label('ユーザー名') }}<br>
  {{ Form::text('username',null,['class' => 'input']) }}<br>
  @if($errors->has('username'))
  <p>{{ $errors->first('username') }}</p>
  @endif

  {{ Form::label('メールアドレス') }}<br>
  {{ Form::text('mail',null,['class' => 'input']) }}<br>
  @if($errors->has('mail'))
  <p>{{ $errors->first('mail') }}</p>
  @endif

  {{ Form::label('パスワード') }}<br>
  {{ Form::text('password',null,['class' => 'input']) }}<br>
  @if($errors->has('password'))
  <p>{{ $errors->first('password') }}</p>
  @endif

  {{ Form::label('パスワード確認') }}
  {{ Form::text('password_confirmation',null,['class' => 'input']) }}
  @if($errors->has('password_confirmation'))
  <p>{{ $errors->first('password_confirmation') }}</p>
  @endif

  {{ Form::submit('登録') }}<br><br>

  <p><a href="/login">ログイン画面へ戻る</a></p>
</div>

{!! Form::close() !!}


@endsection

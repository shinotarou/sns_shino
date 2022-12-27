@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<body>
  <div  class = "frame">
    <p>DAWNSNSへようこそ </p><br>

    {{ Form::label('e-mail') }}<br>
    {{ Form::text('mail',null,['class' => 'input']) }}<br>
    {{ Form::label('password') }}<br>
    {{ Form::password('password',['class' => 'input']) }}<br>

    {{ Form::submit('ログイン') }}<br><br>

    <p><a href="/register">新規ユーザーの方はこちら</a></p>

    {!! Form::close() !!}
  </div>
</body>
@endsection

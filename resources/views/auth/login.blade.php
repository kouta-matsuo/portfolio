@extends('layouts.app')

@section('content')

<div class="text-center">
    <h1>ログイン</h1>
</div>

<div class="login-form">
    {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group last">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-primary login-button']) !!}
            {!! Form::close() !!}

            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2 register-link">新規登録の方はこちら {!! link_to_route('signup.get', '新規登録はこちら') !!}</p>
</div>

@endsection
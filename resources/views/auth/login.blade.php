@extends('layouts.app')

@section('content')

<div class="text-center">
    <h1>新規登録</h1>
</div>

<div class="login-form">
    {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group last">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Log in', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}

            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2 register-link">新規登録の方はこちら {!! link_to_route('signup.get', '新規登録はこちら') !!}</p>
</div>

@endsection
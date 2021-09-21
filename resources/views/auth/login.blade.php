@extends('layouts.app')

@section('content')

<div class="top-heading">
    <h1>ログイン</h1>
</div>

<div class="login-form">
    {!! Form::open(['route' => 'login.post']) !!}
                <div class="login-form__form-group">
                    {!! Form::label('email', 'メールアドレス',['class' => "login-form__form-group-label"]) !!}
                    {!! Form::email('email', null, ['class' => 'login-form__form-group-form-area form-control']) !!}
                </div>

                <div class="login-form__form-group login-form__form-group--padding">
                    {!! Form::label('password', 'パスワード',['class' => "login-form__form-group-label"]) !!}
                    {!! Form::password('password', ['class' => 'login-form__form-group-form-area form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-primary login-form__btn']) !!}
            {!! Form::close() !!}

            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2 login-form__register-link">新規登録の方はこちら {!! link_to_route('signup.get', '新規登録はこちら') !!}</p>
</div>

@endsection
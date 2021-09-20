@extends('layouts.app')

@section('content')

<div class="register-top">
    <h1 class="register-top__heading">新規登録</h1>
</div>

<div class="register-form">
    
    {!! Form::open(['route' => 'signup.post']) !!}
                <div class="register-form__form-group">
                    {!! Form::label('name', 'お名前', ['class' => "register-form__form-group__label"]) !!}
                    {!! Form::text('name', null, ['class' => 'register-form__form-group__form-area form-control']) !!}
                </div>

                <div class="register-form__form-group">
                    {!! Form::label('email', 'メールアドレス',['class' => "register-form__form-group__label"]) !!}
                    {!! Form::email('email', null, ['class' => 'register-form__form-group__form-area form-control']) !!}
                </div>

                <div class="register-form__form-group">
                    {!! Form::label('password', 'パスワード', ['class' => "register-form__form-group__label"]) !!}
                    {!! Form::password('password', ['class' => 'register-form__form-group__form-area form-control']) !!}
                </div>

                <div class="register-form__form-group register-form__form-group--padding">
                    {!! Form::label('password_confirmation', '確認用パスワード', ['class' => "register-form__form-group__label"]) !!}
                    {!! Form::password('password_confirmation', ['class' => 'register-form__form-group__form-area form-control']) !!}
                </div>

                {!! Form::submit('新規登録', ['class' => 'btn btn-primary register-form__btn']) !!}
            {!! Form::close() !!}
        </div>
</div>

@endsection
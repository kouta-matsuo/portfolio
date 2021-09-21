@extends('layouts.app')

@section('content')

<div class="create-form">
    <h2 class="create-form__heading">新規投稿</h2>
    
    {!! Form::model($micropost, ['route' => 'microposts.store']) !!}

                <div class="create-form__form-group">
                    {!! Form::label('from', '都道府県:',['class' => "create-form__form-group-label"]) !!}
                    {!! Form::text('from', null, ['class' => 'create-form__form-group-form-area form-control']) !!}
                </div>
                
                <div class="create-form__form-group">
                    {!! Form::label('facility', '施設名:',['class' => "create-form__form-group-label"]) !!}
                    {!! Form::text('facility', null, ['class' => 'create-form__form-group-form-area form-control']) !!}
                </div>
                    
                <div class="create-form__form-group">    
                    {!! Form::label('content', '説明:',['class' => "create-form__form-group-label"]) !!}
                    {!! Form::textarea('content', null, ['class' => 'create-form__form-group-form-area form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary create-form__create-btn']) !!}

    {!! Form::close() !!}
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="edit-form">
    <h2 class="edit-form__heading">投稿編集</h2>
    {!! Form::model($micropost, ['route' => ['microposts.update', $micropost->id], 'method' => 'put']) !!}

                <div class="edit-form__form-group">
                    {!! Form::label('from', '都道府県:',['class' => "edit-form__form-group-label"]) !!}
                    {!! Form::text('from', null, ['class' => 'edit-form__form-group-form-area form-control']) !!}
                </div>
                
                 <div class="edit-form__form-group">
                    {!! Form::label('facility', '施設名:',['class' => "edit-form__form-group-label"]) !!}
                    {!! Form::text('facility', null, ['class' => 'edit-form__form-group-form-area form-control']) !!}
                </div>

                <div class="edit-form__form-group">
                    {!! Form::label('content', '説明:',['class' => "edit-form__form-group-label"]) !!}
                    {!! Form::textarea('content', null, ['class' => 'edit-form__form-group-form-area edit-form__form-group-text-filed form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary edit-form__edit-btn']) !!}

    {!! Form::close() !!}
</div>

@endsection
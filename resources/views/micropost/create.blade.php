@extends('layouts.app')

@section('content')

<div class="create-form">
    <h2>新規登録</h2>
    
    {!! Form::model($micropost, ['route' => 'microposts.store']) !!}

                <div class="form-group">
                    {!! Form::label('from', '都道府県:') !!}
                    {!! Form::text('from', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('facility', '施設名:') !!}
                    {!! Form::text('facility', null, ['class' => 'form-control']) !!}
                </div>
                    
                <div class="form-group">    
                    {!! Form::label('content', '説明:') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-secondary btn-block store-button']) !!}

            {!! Form::close() !!}
</div>

@endsection
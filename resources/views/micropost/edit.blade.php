@extends('layouts.app')

@section('content')

<div class="edit-form">
    {!! Form::model($micropost, ['route' => ['microposts.update', $micropost->id], 'method' => 'put']) !!}

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

                {!! Form::submit('更新', ['class' => 'btn btn-secondary edit-button btn-block']) !!}

            {!! Form::close() !!}
</div>

@endsection
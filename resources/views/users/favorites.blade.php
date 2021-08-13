@extends('layouts.app')

@section('content')

<div class="big-content">

@include('users.nav-tabs')
    <div class="big">
        @if(count($favorites) > 0 )


    
        @foreach($favorites as $favorite)
            @if(Auth::id() != $favorite->user->id)
        
                <div class="bigfreme">
                    <div class="freme">
                        @if (Auth::user()->is_favorites($favorite->id))
                            {{-- お気に入り解除のボタンのフォーム --}}
                            {!! Form::open(['route' => ['favorites.unfavorite', $favorite->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="fas fa-heart unfavorite"></i>', ['class' => "btn btn-favorite", 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        @endif
                    <div class="micropost-content">
                        <p class="title">ユーザー名:</p>
                        <p>{{ $favorite->user->name }}</p>
                    </div>
                
                    <div class="micropost-content">
                        <p class="title">都道府県名:</p>
                        <p>{{ $favorite->from }}</p>
                    </div>
             
                    <div class="micropost-content">
                        <p class="title">施設名:</p>
                        <p>{{ $favorite->facility }}</p>
                    </div>
             
                    <div class="micropost-content">
                        <p class="title">説明:</p>
                        <p>{!! nl2br(e($favorite->content)) !!}</p>
                    </div>
                </div>
            </div>
            
        @endif
    @endforeach
    
    
    @else
    <div class="favorite-less">
        <p>お気に入りがありません。</p>
    </div>
@endif
</div>
</div>
@endsection
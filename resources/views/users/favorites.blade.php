@extends('layouts.app')

@section('content')

<div class="big-content">

@include('users.nav-tabs')
    <div class="big">
        @if(count($favorites) > 0 )


    
        @foreach($favorites as $favorite)
            @if(Auth::id() != $favorite->user->id)
        
                <div class="big__freme">
                    <div class="big__freme-container">
                        @if (Auth::user()->is_favorites($favorite->id))
                            {{-- お気に入り解除のボタンのフォーム --}}
                            {!! Form::open(['route' => ['favorites.unfavorite', $favorite->id], 'method' => 'delete','class' => "big__freme-container-form"]) !!}
                                {!! Form::button('<i class="fas fa-heart big__freme-container-btn big__freme-container-btn--unfavorite""></i>', 
                                ['class' => "btn btn-favorite", 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        @endif
                    <div class="big__freme-container-microposts">
                        <p class="big__freme-container-text big__freme-container-text--margin">ユーザー名:</p>
                        <p class="big__freme-container-text">{{ $favorite->user->name }}</p>
                    </div>
                
                    <div class="big__freme-container-microposts">
                        <p class="big__freme-container-text big__freme-container-text--margin">都道府県名:</p>
                        <p class="big__freme-container-text">{{ $favorite->from }}</p>
                    </div>
             
                    <div class="big__freme-container-microposts">
                        <p class="big__freme-container-text big__freme-container-text--margin">施設名:</p>
                        <p class="big__freme-container-text">{{ $favorite->facility }}</p>
                    </div>
             
                    <div class="big__freme-container-microposts">
                        <p class="big__freme-container-text big__freme-container-text--margin">説明:</p>
                        <p class="big__freme-container-text">{!! nl2br(e($favorite->content)) !!}</p>
                    </div>
                </div>
            </div>
            
        @endif
    @endforeach
    
    
    @else
    <div class="big__favorite--less">
        <p>お気に入りがありません。</p>
    </div>
@endif
</div>
</div>
@endsection
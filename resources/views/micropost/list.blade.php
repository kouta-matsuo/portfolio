@extends('layouts.app')


@section('content')

<div class="big-content">
    
    @include('users.nav-tabs')

    <div class="big">
        @if(count($microposts) > 0)
    
            @foreach ($microposts as $micropost)
    
                <div class="big__freme">
                    <div class="big__freme__container">
                        <div class="big__freme__container-microposts">
                            <p class="big__freme__container-text big__freme__container-text--margin">ユーザー名:</p>
                            <p class="big__freme__container-text">{{ $user->name }}</p>
                        </div>
                
                        <div class="big__freme__container-microposts">
                            <p class="big__freme__container-text big__freme__container-text--margin">都道府県名:</p>
                            <p class="big__freme__container-text">{{ $micropost->from }}</p>
                        </div>
             
                        <div class="big__freme__container-microposts">
                            <p class="big__freme__container-text big__freme__container-text--margin">施設名:</p>
                            <p class="big__freme__container-text">{{ $micropost->facility }}</p>
                        </div>
             
                        <div class="big__freme__container-microposts">
                            <p class="big__freme__container-text big__freme__container-text--margin">説明:</p>
                            <p class="big__freme__container-text">{!! nl2br(e($micropost->content)) !!}</p>
                        </div>
                    </div>
            
            <div class="big__freme__micropost-link">
            @if(Auth::id() == $micropost->user_id)
                {!! link_to_route('microposts.edit', '編集', ['micropost' => $micropost->id], ['class' => 'btn btn-warning big__freme__micropost-edit-btn']) !!}
                {{-- メッセージ削除フォーム --}}
                {!! Form::model($micropost, ['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete','class' => "big__freme__micropost-form"]) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger big__freme__micropost-delete-btn']) !!}
                {!! Form::close() !!}
            @endif
        </div>
                </div>
        
        @endforeach
         @else 
        <div class="big__micropost--less">
            <p>自分の投稿がありません。</p>
        </div>
        @endif
{{-- ページネーションのリンク --}}
    {{ $microposts->links() }}
</div>
</div>
@endsection
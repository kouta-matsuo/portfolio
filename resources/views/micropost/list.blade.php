@extends('layouts.app')


@section('content')

<div class="big-content">
    
    @include('users.nav-tabs')

    <div class="big">
        @if(count($microposts) > 0)
    
            @foreach ($microposts as $micropost)
    
                <article class="big__freme">
                    <div class="big__freme-container">
                        <div class="big__freme-container-microposts">
                            <p class="big__freme-container-text big__freme-container-text--margin">ユーザー名:</p>
                            <p class="big__freme-container-text">{{ $user->name }}</p>
                        </div>
                
                        <div class="big__freme-container-microposts">
                            <p class="big__freme-container-text big__freme-container-text--margin">都道府県名:</p>
                            <p class="big__freme-container-text">{{ $micropost->from }}</p>
                        </div>
             
                        <div class="big__freme-container-microposts">
                            <p class="big__freme-container-text big__freme-container-text--margin">施設名:</p>
                            <p class="big__freme-container-text">{{ $micropost->facility }}</p>
                        </div>
             
                        <div class="big__freme-container-microposts">
                            <p class="big__freme-container-text big__freme-container-text--margin">説明:</p>
                            <p class="big__freme-container-text">{!! nl2br(e($micropost->content)) !!}</p>
                        </div>
                    </div>
            
            <div class="big__freme-micropost-link">
            @if(Auth::id() == $micropost->user_id)
                {!! link_to_route('microposts.edit', '編集', ['micropost' => $micropost->id], ['class' => 'btn btn-warning big__freme-micropost-edit-btn']) !!}
                {{-- メッセージ削除フォーム --}}
                {!! Form::model($micropost, ['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete','class' => "big__freme-micropost-form"]) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger big__freme-micropost-delete-btn']) !!}
                {!! Form::close() !!}
            @endif
        </div>
                </article>
        
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
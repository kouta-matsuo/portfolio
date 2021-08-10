@extends('layouts.app')


@section('content')

@if(count($microposts) > 0)

    @foreach ($microposts as $micropost)
        <div class="bigfreme">
            <div class="freme">
                    <div class="micropost-content">
                        <p class="title">ユーザー名:</p>
                        <p>{{ $user->name }}</p>
                    </div>
                
                    <div class="micropost-content">
                        <p class="title">都道府県名:</p>
                        <p>{{ $micropost->from }}</p>
                    </div>
             
                    <div class="micropost-content">
                        <p class="title">施設名:</p>
                        <p>{{ $micropost->facility }}</p>
                    </div>
             
                    <div class="micropost-content">
                        <p class="title">説明:</p>
                        <p>{!! nl2br(e($micropost->content)) !!}</p>
                    </div>
            </div>
            
            <div class="micropost-button">
            @if(Auth::id() == $micropost->user_id)
                {!! link_to_route('microposts.edit', '編集', ['micropost' => $micropost->id], ['class' => 'btn btn-warning edit-button']) !!}
                {{-- メッセージ削除フォーム --}}
                {!! Form::model($micropost, ['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger destroy-button']) !!}
                {!! Form::close() !!}
            @endif
        </div>
        </div>
        @endforeach
        @endif
{{-- ページネーションのリンク --}}
    {{ $microposts->links() }}

@endsection
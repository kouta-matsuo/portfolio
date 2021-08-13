<div class="big-content">

@include('users.nav-tabs')

    <div class="big">
    @if(count($microposts) > 0)

        @foreach ($microposts as $micropost)
            <div class="bigfreme">
                <div class="freme">
                    {{--お気に入りのボタン--}}
                       @if(Auth::id() != $micropost->user_id)
                           @if (Auth::user()->is_favorites($micropost->id))
                               {{-- お気に入り解除のボタンのフォーム --}}
                               {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
                                   {!! Form::button('<i class="fas fa-heart unfavorite"></i>', ['class' => "btn btn-favorite", 'type' => 'submit']) !!}
                               {!! Form::close() !!}
        
        
    @else
        {{-- お気に入り追加のボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
            {{--{!! Form::submit('お気に入り', ['class' => "btn btn-secondary "]) !!}--}}
            {!! Form::button('<i class="fas fa-heart favorite"></i>', ['class' => "btn btn-favorite", 'type' => 'submit']) !!}
        {!! Form::close() !!}
    
@endif
@endif
            @foreach ($users as $user)
                @if ($micropost->user_id == $user->id)
                    <div class="micropost-content">
                        <p class="title">ユーザー名:</p>
                        <p>{{ $user->name }}</p>
                    </div>
                @endif
            @endforeach
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
{{-- ページネーションのリンク --}}
    {{ $microposts->links() }}
@endif
</div>
</div>
{{-- 新規登録ページへのリンク --}}
    {!! link_to_route('microposts.create', '+', [], ['class' => 'btn btn-secondary create-button']) !!}
<div class="big-content">

    @include('users.nav-tabs')

    <div class="big">
        @if(count($microposts) > 0)

            @foreach ($microposts as $micropost)
                <article class="big__freme">
                    <div class="big__freme-container">
                        {{--お気に入りのボタン--}}
                        @if(Auth::id() != $micropost->user_id)
                            @if (Auth::user()->is_favorites($micropost->id))
                                {{-- お気に入り解除のボタンのフォーム --}}
                                {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete','class' => "big__freme-container-form"]) !!}
                                    {!! Form::button('<i class="fas fa-heart  big__freme-container-btn big__freme-container-btn--unfavorite"></i>',
                                    ['class' => "btn btn-favorite", 'type' => 'submit']) !!}
                               {!! Form::close() !!}
        
        
         @else
            {{-- お気に入り追加のボタンのフォーム --}}
            {!! Form::open(['route' => ['favorites.favorite', $micropost->id], 'class' => "big__freme-container-form"]) !!}
                {{--{!! Form::submit('お気に入り', ['class' => "btn btn-secondary "]) !!}--}}
                {!! Form::button('<i class="fas fa-heart favorite big__freme-container-btn"></i>', ['class' => "btn btn-favorite", 'type' => 'submit']) !!}
            {!! Form::close() !!}
    
            @endif
        @endif
            @foreach ($users as $user)
                @if ($micropost->user_id == $user->id)
                    <!--ユーザーネーム-->
                    <div class="big__freme-container-microposts">
                        <p class="big__freme-container-text big__freme-container-text--margin">ユーザー名:</p>
                        <p class="big__freme-container-text">{{ $user->name }}</p>
                    </div>
                @endif
            @endforeach
            <!--都道府県-->
                <div class="big__freme-container-microposts">
                    <p class="big__freme-container-text big__freme-container-text--margin">都道府県名:</p>
                    <p class="big__freme-container-text">{{ $micropost->from }}</p>
                </div>
             <!--施設名-->
             <div class="big__freme-container-microposts">
                 <p class="big__freme-container-text big__freme-container-text--margin">施設名:</p>
                 <p class="big__freme-container-text">{{ $micropost->facility }}</p>
             </div>
             <!--説明-->
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
{{-- ページネーションのリンク --}}
    {{ $microposts->links() }}
@endif
</div>
{{-- 新規登録ページへのリンク --}}
    {!! link_to_route('microposts.create', '+', [], ['class' => 'btn btn-secondary big__create-btn']) !!}
</div>

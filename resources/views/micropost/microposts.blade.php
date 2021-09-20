<div class="big-content">

    @include('users.nav-tabs')

    <div class="big">
        @if(count($microposts) > 0)

            @foreach ($microposts as $micropost)
                <div class="big__freme">
                    <div class="big__freme__container">
                        {{--お気に入りのボタン--}}
                        @if(Auth::id() != $micropost->user_id)
                            @if (Auth::user()->is_favorites($micropost->id))
                                {{-- お気に入り解除のボタンのフォーム --}}
                                {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete','class' => "big__freme__container__form"]) !!}
                                    {!! Form::button('<i class="fas fa-heart  big__freme__container__form__btn big__freme__container__form__btn--unfavorite"></i>',
                                    ['class' => "btn btn-favorite", 'type' => 'submit']) !!}
                               {!! Form::close() !!}
        
        
         @else
            {{-- お気に入り追加のボタンのフォーム --}}
            {!! Form::open(['route' => ['favorites.favorite', $micropost->id], 'class' => "big__freme__container__form"]) !!}
                {{--{!! Form::submit('お気に入り', ['class' => "btn btn-secondary "]) !!}--}}
                {!! Form::button('<i class="fas fa-heart favorite big__freme__container__form__btn"></i>', ['class' => "btn btn-favorite", 'type' => 'submit']) !!}
            {!! Form::close() !!}
    
            @endif
        @endif
            @foreach ($users as $user)
                @if ($micropost->user_id == $user->id)
                    <!--ユーザーネーム-->
                    <div class="big__freme__container__microposts">
                        <p class="big__freme__container__microposts__text big__freme__container__microposts__text--margin">ユーザー名:</p>
                        <p class="big__freme__container__microposts__text">{{ $user->name }}</p>
                    </div>
                @endif
            @endforeach
            <!--都道府県-->
                <div class="big__freme__container__microposts">
                    <p class="big__freme__container__microposts__text big__freme__container__microposts__text--margin">都道府県名:</p>
                    <p class="big__freme__container__microposts__text">{{ $micropost->from }}</p>
                </div>
             <!--施設名-->
             <div class="big__freme__container__microposts">
                 <p class="big__freme__container__microposts__text big__freme__container__microposts__text--margin">施設名:</p>
                 <p class="big__freme__container__microposts__text">{{ $micropost->facility }}</p>
             </div>
             <!--説明-->
             <div class="big__freme__container__microposts">
                 <p class="big__freme__container__microposts__text big__freme__container__microposts__text--margin">説明:</p>
                 <p class="big__freme__container__microposts__text">{!! nl2br(e($micropost->content)) !!}</p>
             </div>
        </div>
        
        <div class="big__freme__micropost-link">
            @if(Auth::id() == $micropost->user_id)
                {!! link_to_route('microposts.edit', '編集', ['micropost' => $micropost->id], ['class' => 'btn btn-warning big__freme__micropost-link__edit-btn']) !!}
                {{-- メッセージ削除フォーム --}}
                {!! Form::model($micropost, ['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete','class' => "big__freme__micropost-link__form"]) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger big__freme__micropost-link__form__delete-btn']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endforeach
{{-- ページネーションのリンク --}}
    {{ $microposts->links() }}
@endif
</div>
{{-- 新規登録ページへのリンク --}}
    {!! link_to_route('microposts.create', '+', [], ['class' => 'btn btn-secondary big__create-btn']) !!}
</div>

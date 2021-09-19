<header>
    
    <div class="header-top">
        <a href="/" class="header-top__logo">Go To</a>
        @if(Auth::check())
            {!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'header-top__btn--logout']) !!}
        @endif
        </div>
</header>
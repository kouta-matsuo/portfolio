<header>
    
    <div class="header-top">
        <a href="/" class="top-logo">Go To</a>
        @if(Auth::check())
            {!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'logout-link']) !!}
        @endif
        </div>
</header>
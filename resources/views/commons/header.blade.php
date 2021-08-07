<header>
    <a href="/" class="top-logo">Go To</a>
    @if(Auth::check())
    {!! link_to_route('logout.get', 'ログアウト') !!}
    @endif
</header>
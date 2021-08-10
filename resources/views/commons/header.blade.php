<header>
    
    <div class="header-top">
    <a href="/" class="top-logo">Go To</a>
    @if(Auth::check())
        {!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'logout-link']) !!}
    </div>
    <ul class="nav">
        <li>{!! link_to_route('microposts.list', '自分の投稿', [], ['class' => 'nav-link']) !!}</li>
        <li></li>
    </ul>
    
    @endif
</header>
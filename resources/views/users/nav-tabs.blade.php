@if(Auth::check())
            <ul class="nav__lists">
                <li class="nav__lists-list">{!! link_to_route('microposts.list', '自分の投稿', [], ['class' => 'nav__lists-link']) !!}</li>
                <li class="nav__lists-list">{!! link_to_route('users.favorites', 'お気に入り一覧', [Auth::id()], ['class' => 'nav__lists-link']) !!}</li>
            </ul>
@endif
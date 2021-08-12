@if(Auth::check())
            <ul class="nav">
                <li>{!! link_to_route('microposts.list', '自分の投稿', [], ['class' => 'nav-link']) !!}</li>
                <li>{!! link_to_route('users.favorites', 'お気に入り一覧', [Auth::id()], ['class' => 'nav-link']) !!}</li>
            </ul>
@endif
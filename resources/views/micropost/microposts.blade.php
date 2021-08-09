

@if(count($microposts) > 0)

@foreach ($microposts as $micropost)
    <div class="bigfreme">
        <div class="freme">
            @foreach ($users as $user)
            @if ($micropost->user_id == $user->id)
                <p>{{ $user->name }}</p>
            @endif
            @endforeach
             <p>{{ $micropost->from }}</p>
             <p>{{ $micropost->facility }}</p>
             <p>{!! nl2br(e($micropost->content)) !!}</p>
        </div>
    </div>
@endforeach
{{-- ページネーションのリンク --}}
    {{ $microposts->links() }}
@endif
{{-- 新規登録ページへのリンク --}}
    {!! link_to_route('microposts.create', '+', [], ['class' => 'btn btn-secondary create-button']) !!}
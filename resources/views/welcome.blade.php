@extends('layouts.app')

@section('content')

{{--@if(Auth::check())
    {{ Auth::user()->name }}

@else--}}
    <div class="top-nav">
         <img src="{{ asset('images/img-vue3.jpeg') }}" class="top-nav__img" alt="夕焼けの写真">
        <div class="top-nav__catch">
            <h3 class="top-nav__catch--heading">Go To</h3>
            <p class="top-nav__catch-text">たくさんのユーザの投稿から行ってみたい場所が見つかる！！
            ようこそ楽しい世界へ。</p>
            {{--ユーザ登録ページへのリンク--}}
            {!! link_to_route('signup.get', '新規登録はこちら', [], ['class' => 'btn btn-lg btn-primary top-nav__catch-btn top-nav__catch-btn--register']) !!}
            {{--ログインページへのリンク--}}
            {!! link_to_route('login', 'ログインはこちら', [], ['class' => 'btn btn-lg btn-success top-nav__catch__btn top-nav__catch__btn--login']) !!}
        </div>
    </div>

<div class="top-container">
    <h2 class="top-container__heading">Go Toについて</h2>
    
    <section class="top-container__point">
        <h3 class="top-container__point-heading"><strong class="top-container__point-heading--number">1</strong>行きたい場所が見つかる</h3>
        <div class="top-container__point-box">
            <p class="top-container__point-text">ユーザーが投稿した様々な旅行先の情報から行きたい場所を探せる</p>
            <img src="{{ asset('images/travel.png') }}" class="top-container__point-img" alt="飛行機のイラスト">
        </div>
    </section>
    
    <section class="top-container__point">
        <h3 class="top-container__point-heading"><strong class="top-container__point-heading--number">2</strong>投稿してどこにったかの記憶になる</h3>
        <div class="top-container__point-box">
            <p classs="top-container__point-text">自分の訪れたところを投稿して自分がどこに行ったかの記録になる。</p>
            <img src="{{ asset('images/travel2.png') }}" class="top-container__point-img" alt="しおりのイラスト">
        </div>
    </section>
</div>
{{--@endif--}}

@endsection
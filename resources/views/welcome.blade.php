@extends('layouts.app')

@section('content')

@if(Auth::check())
    {{ Auth::user()->name }}

@else
    <div class="top-nav">
         <img src="{{ asset('images/img-vue3.jpeg') }}" alt="夕焼けの写真">
        <div class="catch">
            <h3>Go To</h3>
            <p>たくさんのユーザの投稿から行ってみたい場所が見つかる！！
            ようこそ楽しい世界へ。</p>
            {{--ユーザ登録ページへのリンク--}}
            {!! link_to_route('signup.get', '新規登録はこちら', [], ['class' => 'btn btn-lg btn-primary register-button']) !!}
            {{--ログインページへのリンク--}}
            {!! link_to_route('login', 'ログインはこちら', [], ['class' => 'btn btn-lg btn-success']) !!}
        </div>
    </div>

<div class="top-content">
    <h2>Go Toについて</h2>
    
    <section class="goto">
        <h3><strong>1</strong>行きたい場所が見つかる</h3>
        <div class="section-content">
            <p>ユーザーが投稿した様々な旅行先の情報から行きたい場所を探せる</p>
            <img src="{{ asset('images/travel.png') }}" alt="飛行機のイラスト">
        </div>
    </section>
    
    <section class="goto">
        <h3><strong>2</strong>投稿してどこにったかの記憶になる</h3>
        <div class="section-content">
            <p>自分の訪れたところを投稿して自分がどこに行ったかの記録になる。</p>
            <img src="{{ asset('images/travel2.png') }}" alt="しおりのイラスト">
        </div>
    </section>
</div>
@endif

@endsection
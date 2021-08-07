@extends('layouts.app')

@section('content')

<div class="top-nav">
    <img src="{{ asset('images/img-vue3.jpeg') }}" alt="夕焼けの写真">
    <div class="catch">
        <h3>Go To</h3>
        <p>たくさんのユーザの投稿から行ってみたい場所が見つかる！！
        ようこそ楽しい世界へ。</p>
        {{--ユーザ登録ページへのリンク--}}
        {!! link_to_route('signup.get', '新規登録はこちら', [], ['class' => 'btn btn-lg btn-primary']) !!}
    </div>
    
</div>

@endsection
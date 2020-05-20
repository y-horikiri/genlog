@extends('layouts.common')

@section('title', 'げんログ - ギタリスト、ベーシストのための弦交換管理サービス')
@section('description', 'ギタリスト、ベーシストのための弦交換管理サービスです。')
@section('pageCss')
    <link href="/css/index.css" rel="stylesheet">
    <link href="/css/textpage.css" rel="stylesheet">
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')

    <div class="container">
        <div class="col-xs-12">
            <div class="text-center">
                <h1>「前回弦交換したの、いつだったっけ？」<br>
                    とならないために。</h1>
                <p>げんログは、ギタリスト、ベーシストのための弦交換管理サービスです。</p>
                <h2>あなたの弦楽器を一元管理。</h2>
                <p>げんログでは、あなたの楽器と張ってある弦の情報を管理することができます。<br>
                    前回の交換からの経過日数がわかるので、交換時期の目安にできます。</p>
{{--TODO 動画を作ったらここに埋め込む                --}}
{{--                <div class="movie">--}}
{{--                    <iframe width="560" height="315" src="https://www.youtube.com/embed/D845g67V4Bs" frameborder="0"--}}
{{--                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
{{--                            allowfullscreen></iframe>--}}
{{--                </div>--}}
                <h3>まずはTwitterアカウントで<a href="auth/twitter">登録</a>！</h3>
            </div>
        </div>
    </div>
@endsection


@section('pageJs')
    {{--    <script src="/js/page.js"></script>--}}
@endsection

@include('layouts.footer')

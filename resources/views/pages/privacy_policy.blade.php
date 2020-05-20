@extends('layouts.common')

@section('title', 'プライバシーポリシー | げんログ')
@section('pageCss')
    <link href="/css/textpage.css" rel="stylesheet">
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')

    <div class="container">
        <div class="col-xs-12">
            <div class="text-left">
                <h1>プライバシーポリシー</h1>
                <h3>当サイトが利用しているアクセス解析ツールに関して</h3>
                <p>
                    当サイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を使用しています。このGoogleアナリティクスはデータの収集のためにCookieを使用しています。このデータは匿名で収集されており、個人を特定するものではありません。</p>
                <p>
                    この機能はCookieを無効にすることで収集を拒否することが出来ますので、お使いのブラウザの設定をご確認ください。この規約に関しての詳細は<a href="https://marketingplatform.google.com/about/analytics/terms/jp/" target="_blank">Googleアナリティクスサービス利用規約のページ</a>や
                    <a href="https://policies.google.com/technologies/ads?hl=ja" target="_blank">Googleポリシーと規約ページ</a>をご覧ください。</p>
                <h3>当サイトに掲載されている広告に関して</h3>
                <p>
                    当サイトは、Amazon.co.jpを宣伝しリンクすることによってサイトが紹介料を獲得できる手段を提供することを目的に設定されたアフィリエイトプログラムである、Amazonアソシエイト・プログラムの参加者です。</p>
            </div>
        </div>
    </div>
@endsection


@section('pageJs')
@endsection

@include('layouts.footer')

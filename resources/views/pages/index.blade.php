@extends('layout.common')

@section('title', 'ホーム')
@section('keywords', 'ギター,ベース,弦,交換,管理,ツール,サービス,アプリ')
@section('description', '弦楽器の弦交換の履歴を管理するWebサービスです。')
@section('pageCss')
    <link href="/css/page.css" rel="stylesheet">
@endsection

@include('layout.head')

@include('layout.header')

@section('content')
    <p>コンテンツ内容が入ります</p>
@endsection


@section('pageJs')
    <script src="/js/page.js"></script>
@endsection

@include('layout.footer')
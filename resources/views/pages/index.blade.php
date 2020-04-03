@extends('layouts.common')

@section('title', 'ホーム')
@section('keywords', 'ギター,ベース,弦,交換,管理,ツール,サービス,アプリ')
@section('description', '弦楽器の弦交換の履歴を管理するWebサービスです。')
@section('pageCss')
{{--    <link href="/css/page.css" rel="stylesheet">--}}
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')

    <div class="container border">
    @foreach($gears as $gear)
        <table class="table table-bordered">
            <tr>
                <th>名前</th>
                <td>{{$gear->name}}</td>
            </tr>
            @foreach($gear->stringHistories as $history)
                {{--最新の弦のみを表示--}}
                @if($loop->first)
                    <tr>
                        <th>弦</th>
                        <td>{{$history->brand}}：{{$history->gauges}}</td>
                    </tr>
                    <tr>
                        <th>張った日</th>
                        <td>{{$history->change_date->format('Y年m月d日')}}</td>
                    </tr>
                @endif
            @endforeach
        </table>
    @endforeach
    </div>
@endsection


@section('pageJs')
{{--    <script src="/js/page.js"></script>--}}
@endsection

@include('layouts.footer')
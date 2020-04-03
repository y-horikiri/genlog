@extends('layouts.common')

@section('title', 'ホーム')
@section('keywords', 'ギター,ベース,弦,交換,管理,ツール,サービス,アプリ')
@section('description', '弦楽器の弦交換の履歴を管理するWebサービスです。')
@section('pageCss')
    <link href="/css/index.css" rel="stylesheet">
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($gears as $gear)
                <div class="col-xs-12 col-lg-6">
                    <table class="table table-bordered ">
                        <tr>
                            <th class="gears"><img src="/img/guitar1.png" alt="アイコン" width="24px" height="24px"></th>
                            <td><a href="/history?id={{$gear->id}}">{{$gear->name}}</a></td>
                        </tr>
                        @foreach($gear->stringHistories as $history)
                            {{--最新の弦のみを表示--}}
                            @if($loop->first)
                                <tr>
                                    <th class="gears">弦</th>
                                    <td>{{$history->brand}}：{{$history->gauges}}</td>
                                </tr>
                                <tr>
                                    <th class="gears">張った日</th>
                                    <td>{{$history->change_date->format('Y年m月d日')}}<br>
                                        {{$history->getPeriod()->m}}ヶ月と{{$history->getPeriod()->d}}日経過 <br>
                                        {{$history->indicationMessage}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button class="btn btn-primary mx-auto d-block" type="submit" formmethod="get"
                                                formaction="/newstring?id={{$gear->id}}">
                                            弦を交換する
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            @endforeach
        </div>
        <div>{{$gears->links()}}</div>
    </div>
@endsection


@section('pageJs')
    {{--    <script src="/js/page.js"></script>--}}
@endsection

@include('layouts.footer')
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
        <div>
            <h1>あなたの楽器一覧</h1>
        </div>
        <div>
            <form action="{{url('/newgear')}}" method="get" class="form-group">
                <input type="submit" id="new-gear-button" value="新規楽器登録" class="btn btn-primary form-control">
            </form>
        </div>
        <div class="row">
            @foreach($gears as $gear)
                <div class="col-xs-12 col-lg-6">
                    <form method="get">
                        <table class="table">
{{--                        <table class="table gear-{{$gear->color}}">--}}
                            <tr>
                                <th class="gears"><img src="/img/icon{{$gear->icon_id}}.png" alt="アイコン" width="48px" height="48px">
                                </th>
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
                                        {{--TODO:tdの内容は1つの処理でModelから取得するべき？--}}
                                        <td>{{$history->change_date->format('Y年m月d日')}}<br>
                                            {{$history->getPeriod()->m}}ヶ月と{{$history->getPeriod()->d}}日経過 <br>
                                            {{$history->indicationMessage}}</td>
                                    </tr>
                                    <tr>
                                        <th class="gears">コメント</th>
                                        <td class="overflow-wrap-break">{{$history->comment}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="gear_id" value="{{$gear->id}}">
                                    <input class="btn btn-primary mx-auto d-block" type="submit"
                                           formaction="{{url('/newstring')}}" value="弦を交換する">
                                </td>
                            </tr>
                        </table>
                    </form>
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

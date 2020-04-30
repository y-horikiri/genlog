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
            <form action="{{url('/gears/new')}}" method="get" class="form-group">
                <input type="submit" id="new-gear-button" value="新規楽器登録" class="btn btn-primary form-control">
            </form>
        </div>
        <div class="row">
            @foreach($gears as $gear)
                <div class="col-xs-12 col-lg-6">
                    <form method="get">
                        <table class="table">
{{--                        <table class="table gear-{{$gear->color}}">--}}
                            <tr class="">
{{--                            <tr class="gear-{{$gear->color}}">--}}
                                <th class="gears">
                                    <div class="color-sample {{$gear->color}}"></div>
{{--                                    <img src="{{asset("/img/icon$gear->icon_id.png")}}" alt="アイコン" width="48px" height="48px">--}}
                                </th>
                                <td><a href="/gears/{{$gear->id}}">{{$gear->name}}</a></td>
                            </tr>
                            @forelse($gear->stringHistories as $history)
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
                                            <strong class="text-danger">{{$history->getPeriod()->m}}</strong>ヶ月と<strong class="text-danger">{{$history->getPeriod()->d}}</strong>日経過</td>
                                    </tr>
                                    <tr>
                                        <th class="gears">コメント</th>
                                        <td class="overflow-wrap-break">{{$history->comment}}</td>
                                    </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="2">
                                        まだ弦が登録されていません！
                                    </td>
                                </tr>
                            @endforelse
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

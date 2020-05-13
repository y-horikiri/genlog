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
            @forelse($gears as $gear)
                <div class="col-xs-12 col-lg-6">
                    <form method="get">
                        <table class="table">
                            <tr class="">
                                <th class="gears">
                                    <div class="color-sample {{$gear->color}}"></div>
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
                                        <td>{{$history->change_date->format('Y年m月d日')}}<br>
                                            @if($history->getPeriod()->y >= 1)
                                                {{--                                            @formatter:off--}}
                                                <strong class="text-danger">{{$history->getPeriod()->y}}</strong>年と@endif<strong
{{--                                                @formatter:on--}}
class="text-danger">{{$history->getPeriod()->m}}</strong>ヶ月と<strong
                                                class="text-danger">{{$history->getPeriod()->d}}</strong>日経過
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="gears">コメント</th>
                                        <td class="overflow-wrap-break">{!!nl2br(e($history->comment))!!}</td>
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
            @empty
                <div class="col-12">
                    <p>楽器が登録されていません。</p>
                    <p>まずは新規楽器登録ボタンからあなたの楽器を登録しましょう！</p>
                </div>

            @endforelse
        </div>
        <div>{{$gears->links()}}</div>
    </div>
@endsection


@section('pageJs')
    {{--    <script src="/js/page.js"></script>--}}
@endsection

@include('layouts.footer')

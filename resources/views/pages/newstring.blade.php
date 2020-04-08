@extends('layouts.common')

@section('title', '新規弦登録')
@section('keywords', '')
@section('description', '')
@section('pageCss')
    <link href="/css/newstring.css" rel="stylesheet">
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')

    <div class="container">
        <div>
            <h1>
                新規弦登録
            </h1>
        </div>
        <div class="row">
            <form action="/newstring" method="post">
                @csrf
                <input type="hidden" name="gear_id" id="gear_id" value="{{$gear->id}}">
                <input type="hidden" id="gear_type" value="{{$gear->type}}">
                @isset($gear->stringHistories[0])
                    <input type="hidden" id="previous_brand" value="{{$gear->stringHistories[0]->brand}}">
                @endisset
                @foreach($errors->all() as $error)
                    @if($loop->first)
                        <div class="alert alert-danger">
                            @endif
                            {{$error}}<br>
                            @if($loop->last)
                        </div>
                    @endif
                @endforeach
                <table class="table table-bordered">
                    <tr>
                        {{--TODO アイコンをタイプに応じて変更--}}
                        <th class="gears"><img src="/img/guitar1.png" alt="アイコン" width="24px" height="24px">
                        </th>
                        <td>{{$gear->name}}</td>
                    </tr>
                    <tr>
                        <th>ブランド</th>
                        <td>
                            <div class="form-inline"><input type="text" name="brand" id="brand" class="form-control"
                                                            value="{{old('brand')}}">
                                <input type="button" value="前回と同じ" id="same" class="btn btn-info btn-sm m-2"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>ゲージ</th>
                        <td>
                            @for($i = 1; $i <= $gear->string_count; $i++)
                                <input type="text" name="gauge_{{$i}}" id="gauge_{{$i}}" class="gauge mb-1"
                                       value="{{old('gauge_'.$i)}}">
                                @if(!($i == $gear->string_count))
                                    -
                                @endif
                            @endfor
                            <br>
                            @switch($gear->type)
                                @case("1")
                                <input type="button" value="09-" id="gauge09" class="gaugebutton btn btn-info btn-sm">
                                <input type="button" value="10-" id="gauge10" class="gaugebutton btn btn-info btn-sm">
                                @break
                                @case("2")
                                <input type="button" value="10-" id="gauge10" class="gaugebutton btn btn-info btn-sm">
                                <input type="button" value="11-" id="gauge11" class="gaugebutton btn btn-info btn-sm">
                                <input type="button" value="12-" id="gauge12" class="gaugebutton btn btn-info btn-sm">
                                <input type="button" value="13-" id="gauge13" class="gaugebutton btn btn-info btn-sm">
                                @break
                                @case("3")
                                <input type="button" value="040-" id="gauge40" class="gaugebutton btn btn-info btn-sm">
                                <input type="button" value="045-" id="gauge45" class="gaugebutton btn btn-info btn-sm">
                                @break
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th>交換日付</th>
                        <td><input type="text" name="change_date" id="change_date" value="{{old('change_date')}}"></td>
                    </tr>
                    <tr>
                        <th>コメント</th>
                        <td><textarea name="comment" id="comment" cols="45" rows="3">{{old('comment')}}</textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="row justify-content-center">
                                <div>
                                    <input class="btn btn-primary" type="submit" name="action" value="登録">
                                    <input class="btn btn-secondary" type="submit" name="action" value="キャンセル">
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection


@section('pageJs')
    <script src="{{asset('/js/newstring.js')}}" type="module" async></script>
@endsection

@include('layouts.footer')

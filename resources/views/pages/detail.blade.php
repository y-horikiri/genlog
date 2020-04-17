@extends('layouts.common')

@section('title', '楽器詳細')
@section('keywords', '')
@section('description', '')
@section('pageCss')
    <link href="/css/gear.css" rel="stylesheet">
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')

    <div class="container">
        <div class="row">
            <div class="mx-auto col-lg-8">
                <div>
                    <h1>
                        楽器詳細
                    </h1>
                </div>
                @foreach($errors->all() as $error)
                    @if($loop->first)
                        <div class="alert alert-danger">
                            @endif
                            {{$error}}<br>
                            @if($loop->last)
                        </div>
                    @endif
                @endforeach
                <table class="table">
                    <tr>
                        <th class="gears">名前
                        </th>
                        <td>
                            <p id="name">{{$gear->name}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="gears">種類
                        </th>
                        <td>
                            <p>{{$gear->gearType->name}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="gears">アイコン
                        </th>
                        <td>
                            <img src="/img/icon{{$gear->icon_id}}.png" alt="アイコン" width="48px" height="48px">
                        </td>
                    </tr>
                    <tr>
                        <th class="gears">色
                        </th>
                        <td>
                            <div class="color-sample {{$gear->color}}"></div>
                        </td>
                    </tr>
                    <tr>
                        <th class="gears">弦の本数
                        </th>
                        <td>
                            <p>{{$gear->string_count}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="row justify-content-center">
                                <input type="hidden" id="id" value="{{$gear->id}}">
                                <div>
                                    <a href="{{url("gears/edit/$gear->id")}}">
                                        <input class="btn btn-primary" type="button" id="edit-button" value="編集"></a>
                                    <a href="{{url("gears/delete/$gear->id")}}">
                                        <input class="btn btn-danger" type="button" id="delete-button" value="削除"></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-12">
                <div>
                    <h2>弦交換の履歴</h2>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <tr>
                            <th>日付</th>
                            <th>ブランド</th>
                            <th>ゲージ</th>
                            <th>コメント</th>
                        </tr>
                        @foreach($gear->stringHistories as $history)
                            <tr>
                                <td>{{$history->change_date->format('Y/m/d')}}</td>
                                <td>{{$history->brand}}</td>
                                <td>{{$history->gauges}}</td>
                                <td>{{$history->comment}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('pageJs')
    <script src="{{asset('/js/detail.js')}}" type="module" async></script>
@endsection

@include('layouts.footer')

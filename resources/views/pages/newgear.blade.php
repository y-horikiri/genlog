@extends('layouts.common')

@section('title', '新規楽器登録')
@section('keywords', '')
@section('description', '')
@section('pageCss')
    <link href="/css/newgear.css" rel="stylesheet">
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')

    <div class="container">
        <div class="row">
            <div class="mx-auto col-lg-8">
                <div>
                    <h1>
                        新規楽器登録
                    </h1>
                </div>
                <form action="/newgear" method="post">
                    @csrf
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
                            <td><input type="text" name="name" id="name" class="form-control" style="width: 250px;">
                            </td>
                        </tr>
                        <tr>
                            <th class="gears">種類
                            </th>
                            <td>
                                <input type="radio" name="type" id="eg" value="eg" class="" checked="checked">
                                <label class="radio-inline" for="eg">エレキギター</label>
                                <input type="radio" name="type" id="ag" value="ag">
                                <label class="radio-inline" for="ag">アコースティックギター</label>
                                <input type="radio" name="type" id="eb" value="eb">
                                <label class="radio-inline" for="eb">エレキベース</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="gears">アイコン
                            </th>
                            <td>
                                <div class="selection-group">
                                    <input id="icon1" type="radio" name="icon" value="1">
                                    <label for="icon1">
                                        <img src="/img/guitar1.png" alt="ST" width="48px" height="48px">
                                    </label>

                                    <input id="icon2" type="radio" name="icon" value="2">
                                    <label for="icon2">
                                        <img src="/img/guitar2.png" alt="AG" width="48px" height="48px">
                                    </label>

                                    <input id="icon3" type="radio" name="icon" value="3">
                                    <label for="icon3">
                                        <img src="/img/guitar3.png" alt="EB" width="48px" height="48px">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="gears">色
                            </th>
                            <td>
                                <div class="selection-group">
                                    <input id="black" type="radio" name="color" value="1">
                                    <label for="black">
                                        <div class="color-sample black"></div>
                                    </label>

                                    <input id="white" type="radio" name="color" value="2">
                                    <label for="white">
                                        <div class="color-sample white"></div>
                                    </label>

                                    <input id="red" type="radio" name="color" value="6">
                                    <label for="red">
                                        <div class="color-sample red"></div>
                                    </label>

                                    <input id="blue" type="radio" name="color" value="7">
                                    <label for="blue">
                                        <div class="color-sample blue"></div>
                                    </label>

                                    <input id="green" type="radio" name="color" value="8">
                                    <label for="green">
                                        <div class="color-sample green"></div>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="gears">弦の本数
                            </th>
                            <td>
                                <input type="number" name="string_count" id="string_count" class="form-control"
                                       style="width: 60px;">
                            </td>
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
    </div>
@endsection


@section('pageJs')
    {{--    <script src="{{asset('/js/newgear.js')}}" type="module" async></script>--}}
@endsection

@include('layouts.footer')

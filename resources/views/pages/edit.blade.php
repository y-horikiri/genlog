@extends('layouts.common')

@section('title', '楽器編集 | げんログ')
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
                        楽器編集
                    </h1>
                </div>
                <form action="{{url("gears/$gear->id")}}" method="post">
                    @method('put')
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
                            <td><input type="text" name="name" id="name" class="form-control" style="width: 250px;"
                                       value="{{old('name', $gear->name)}}">
                            </td>
                        </tr>
                        <tr>
                            <th class="gears">種類
                            </th>
                            <td>
                                <input type="radio" name="type" id="eg" value="1"
                                    {{ old('type',$gear->type) == '1' ? 'checked' : ''}}>
                                <label class="radio-inline" for="eg">エレキギター</label><br>
                                <input type="radio" name="type" id="ag" value="2"
                                    {{ old('type', $gear->type) == '2' ? 'checked' : ''}}>
                                <label class="radio-inline" for="ag">アコースティックギター</label><br>
                                <input type="radio" name="type" id="eb" value="3"
                                    {{ old('type', $gear->type) == '3' ? 'checked' : ''}}>
                                <label class="radio-inline" for="eb">エレキベース</label>
                            </td>
                        </tr>
{{--                        <tr>--}}
{{--                            <th class="gears">アイコン--}}
{{--                            </th>--}}
{{--                            <td>--}}
{{--                                <div class="selection-group">--}}
{{--                                    @foreach(config('const.GEAR_ICON') as $key => $value)--}}
{{--                                        <input id="icon{{$key}}" type="radio" name="icon_id" value="{{$key}}"--}}
{{--                                            {{old('icon_id', $gear->icon_id) == $key ? 'checked' : ''}}>--}}
{{--                                        <label for="icon{{$key}}">--}}
{{--                                            <img src="{{asset("img/icon$key.png")}}" alt="{{$value}}" width="48px" height="48px">--}}
{{--                                        </label>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                        <tr>
                            <th class="gears">色
                            </th>
                            <td>
                                <div class="selection-group">
                                    @foreach(config('const.GEAR_COLORS') as $key => $value)
                                        <input id="{{$value}}" type="radio" name="color" value="{{$value}}"
                                            {{old('color', $gear->color) == $value ? 'checked' : ''}}>
                                        <label for="{{$value}}">
                                            <div class="color-sample {{$value}}"></div>
                                        </label>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="gears">弦の本数
                            </th>
                            <td>
                                <input type="number" name="string_count" id="string_count" class="form-control"
                                       style="width: 60px;" value="{{old('string_count', $gear->string_count)}}">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="row justify-content-center">
                                    <div>
                                        <input class="btn btn-primary" type="submit" name="action" value="更新">
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

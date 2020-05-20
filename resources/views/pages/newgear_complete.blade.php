@extends('layouts.common')

@section('title', '楽器登録完了 | げんログ')
@section('pageCss')
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-info">
                    新しい楽器が登録されました！
                </div>
                <form action="/newstring" method="get">
                    <input type="hidden" name="gear_id" id="gear_id" value="{{$gear_id}}">
                    <div>
                        <input type="submit" value="弦を登録する" class="btn btn-primary">
                    </div>
                </form>
                <div>
                    <a href="{{url('/')}}">トップに戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('pageJs')
@endsection

@include('layouts.footer')

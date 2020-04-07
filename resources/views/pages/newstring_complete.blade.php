@extends('layouts.common')

@section('title', '弦登録完了')
@section('keywords', '')
@section('description', '')
@section('pageCss')
    {{--    <link href="/css/newstring.css" rel="stylesheet">--}}
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="alert alert-info col-6">
                新しい弦が登録されました！
            </div>
            <div class="col-12">
                <div class="twitter">
                    <a href="https://twitter.com/share" class="twitter-share-button"
                       data-text="{{$gear->name}}の弦を{{$gear->StringHistories->first()->brand}}の{{$gear->StringHistories->first()->gauge_1}}-に交換しました！"
                       data-url="https://genlog.com/" data-hashtags="げんろぐ" data-show-count="false" data-size="large" data-lang="ja">ツイート</a>
                </div>
                <div>
                    <a href="https://www.amazon.co.jp/s/ref=as_li_ss_tl?k={{$gear->StringHistories->first()->brand}}+{{$gear->StringHistories->first()->gauge_1}}&__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&ref=nb_sb_noss_2&linkCode=ll2&tag=irevaveri-22&linkId=08386a66d907df68f34fc9a910797a55&language=ja_JP">Amazonで弦を購入する</a>
                </div>
                <div>
                    <a href="{{url('/')}}">トップに戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('pageJs')
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endsection

@include('layouts.footer')

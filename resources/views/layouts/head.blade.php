@section('head')
    <meta charset="UTF-8">
    <title>@yield('title') | げんろぐ</title>
    <meta name="description" itemprop="description" content="@yield('description')">
    <meta name="keywords" itemprop="keywords" content="@yield('keywords')">
    <link href="/css/layout.css" rel="stylesheet">
    @yield('pageCss')
@endsection
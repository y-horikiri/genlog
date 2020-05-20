@section('head')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-65255042-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-65255042-3');
    </script>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="description" itemprop="description" content="@yield('description')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.css">
    <meta property="og:url" content="https://www.gen-log.net/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:site_name" content="げんログ" />
{{--    <meta property="og:image" content="" />--}}
    @yield('pageCss')
@endsection

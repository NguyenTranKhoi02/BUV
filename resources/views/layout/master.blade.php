<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    @include('layout.shared.meta-seo')
    <meta name="robots" content="max-image-preview:large,@yield('Robots','index, follow')" />
    <meta http-equiv="refresh" content="3600" />
    <meta name="Language" content="vi" />
    <meta name="distribution" content="Global" />
    <meta name="revisit-after" content="1 days" />
    <meta name="GENERATOR" content="{{config('siteInfo.url')}}">
    <meta name="RATING" content="GENERAL" />
    <link rel="shortcut icon" href="{{config('siteInfo.favicon')}}" type="image/png">
    <meta name="site_path" content="{{config('siteInfo.url')}}">
    <meta name="author" content="{{ config('siteInfo.author') }}">
    <meta name="og:site_name" content="{{ config('siteInfo.site_name') }}">
    <meta name="copyright" content="Copyright (c) by {{config('siteInfo.copyright')}}" />
    <meta http-equiv="x-dns-prefetch-control" content="on" />
    <link rel="stylesheet" href="./css/lib/swiper-bundle.min.css" />
    <link href="./css/scss/styles.css" rel="stylesheet" />
    @yield('css')
    @include('layout.shared.ga')
</head>
<body>
    @include('layout.header')
    <div class="main">
        @yield('content')
    </div>
    @include('layout.footer')
    @yield('js')
</body>
</html>

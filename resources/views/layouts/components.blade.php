<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script async src="{{ env('UMAMI_URL') }}/script.js" data-website-id="{{ env('UMAMI_WEBSITE_ID') }}"></script>

    <link rel="stylesheet" href="/css/@yield('id')" type="text/css">
</head>
<body>
@yield('content')
@vite(['resources/js/app.js'])
</body>
</html>

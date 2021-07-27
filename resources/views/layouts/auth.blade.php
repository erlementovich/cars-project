<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="/assets/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
</head>
<body class="body-wrap">
@yield('content')
<script src="{{ mix('js/main.js') }}"></script>
</body>
</html>

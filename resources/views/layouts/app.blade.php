<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <x-panels.styles/>
    @stack('head-styles')
    <x-panels.scripts/>
    @stack('head-scripts')

    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="/assets/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<div class="wrapper flex flex-1 flex-col">
    <x-panels.header.wrap :categories="$categories"/>
    @yield('breadcrumbs')
    <main class="flex-1 container mx-auto bg-white {{ $contentClass ?? ''}}">
        @yield('content')
    </main>
    <x-panels.footer/>
</div>

</body>
</html>

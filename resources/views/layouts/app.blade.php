<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <x-panels.meta/>
    <x-panels.styles/>
    @stack('head-styles')
    <x-panels.scripts/>
    @stack('head-scripts')

    @section('inner-styles')
        <link href="{{ mix('assets/css/inner.css') }}" rel="stylesheet">
    @show
    <title>{{ config('app.name') }} - @yield('title')</title>
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<div class="wrapper flex flex-1 flex-col">
    <x-panels.header.wrap :categories="$categories"/>

    @section('breadcrumbs')
        {{ Breadcrumbs::render() }}
    @show

    <main class="flex-1 container mx-auto bg-white {{ $contentClass ?? ''}}">
        @section('wrapper')
            <div class="p-4">
                <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>
                @yield('content')
            </div>
        @show
    </main>

    <x-panels.footer/>
</div>
</body>
</html>

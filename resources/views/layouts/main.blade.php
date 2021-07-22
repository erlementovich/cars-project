@extends('layouts.app')
@section('breadcrumbs')
    <x-panels.breadcrumbs/>
@endsection

@push('head-styles')
    <link href="/assets/css/inner_page_template_styles.css" rel="stylesheet">
@endpush

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>
        @yield('child-content')
    </div>
@endsection

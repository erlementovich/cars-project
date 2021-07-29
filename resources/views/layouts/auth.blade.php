@extends('layouts.app')
@push('head-styles')
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
@endpush
@push('head-scripts')
    <script src="{{ mix('js/main.js') }}"></script>
@endpush
@section('wrapper')
    <div class="body-wrap">
        @yield('content')
    </div>
@endsection

@props(['breadcrumb', 'loop'])
@if ($breadcrumb->url && !$loop->last)
    <a class="hover:text-orange" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
    </svg>
@else
    <span>{{ $breadcrumb->title }}</span>
@endif

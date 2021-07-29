@props(['category' => null])
@php
    $children = $category->children;
    $hasChild = $children->isNotEmpty();
    $hasActiveChild = false;
@endphp
@if($hasChild)
    @foreach($children as $child)
        @if(request()->is('catalog/' . $child->slug))
            @php $hasActiveChild = true; @endphp
            @break
        @endif
    @endforeach
@endif
<li class="group">

    <a class="{{ $hasActiveChild || request()->is('catalog/' . $category->slug) ? 'text-orange' : '' }}
        @if($hasChild)
            inline-block p-4 text-black font-bold border-l
            border-r border-transparent group-hover:text-orange
            group-hover:bg-gray-100 group-hover:border-l
            group-hover:border-r group-hover:border-gray-200
            group-hover:shadow
        @else
            inline-block p-4 text-black font-bold hover:text-orange
        @endif"
        href="{{ route('categories.show', $category) }}">
        {{ $category->name }}
        @if($hasChild)
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7"/>
            </svg>
        @endif
    </a>
    <x-panels.cat-menu.submenu :children="$children"/>
</li>

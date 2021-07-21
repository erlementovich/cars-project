<li>
    <a class="@currentRoute($routeName) {{ $activeClass ?? '' }}  @else {{ $nonActiveClass ?? '' }}  @endif"
       href="{{ route($routeName) }}">{{ $routeTitle }}</a>
</li>

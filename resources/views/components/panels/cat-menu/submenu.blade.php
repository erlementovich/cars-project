@if($children->isNotEmpty())
    <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
        @foreach($children as $childCategory)
            <li>
                <a class="{{ request()->is('catalog/' . $childCategory->slug) ? 'text-orange' : '' }} block py-2 px-4 text-black hover:text-orange hover:bg-gray-100"
                   href="{{ route('categories.show', $childCategory) }}">
                    {{ $childCategory->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endif

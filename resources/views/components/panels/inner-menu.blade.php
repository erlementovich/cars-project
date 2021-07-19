<aside class="hidden sm:block col-span-1 border-r p-4">
    <nav>
        <ul class="text-sm">
            <li>
                <p class="text-xl text-black font-bold mb-4">Информация</p>
                <ul class="space-y-2">
                    @include('components.panels.static-menu.wrap',
                    ['activeClass' => 'text-orange cursor-default', 'nonActiveClass' => 'hover:text-orange'])
                </ul>
            </li>
        </ul>
    </nav>
</aside>

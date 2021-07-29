@if($categories->isNotEmpty())
    <nav class="order-1">
        <ul class="block lg:flex">
            @foreach($categories as $category)
                <x-panels.cat-menu.item :category="$category"/>
            @endforeach
        </ul>
    </nav>
@endif

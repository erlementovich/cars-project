@if (count($breadcrumbs))
    <nav class="container mx-auto bg-gray-100 py-1 px-4 text-sm flex items-center space-x-2">
        @foreach($breadcrumbs as $breadcrumb)
            <x-breadcrumbs.item :loop="$loop" :breadcrumb="$breadcrumb"/>
        @endforeach
    </nav>
@endif

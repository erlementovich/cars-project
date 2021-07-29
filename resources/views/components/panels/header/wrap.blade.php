@props(['categories' => null])
<header class="bg-white">
    <div class="border-b">
        <div
            class="container mx-auto block sm:flex sm:justify-between sm:items-center py-4 px-4 sm:px-0 space-y-4 sm:space-y-0">
            <div class="flex justify-center">
                @currentRoute('main')
                <span class="inline-block sm:inline"/>
                @else
                    <a href="{{ route('main') }}" class="inline-block sm:inline hover:opacity-75"/>
                @endif
                <img src="/assets/images/logo.png" width="222" height="30" alt="">
                @currentRoute('main') </span> @else </a> @endif
            </div>
            <x-panels.header.auth/>
        </div>
    </div>
    <div class="border-b">
        <div class="container mx-auto block lg:flex justify-between items-center px-2 sm:px-0">
            <form name="search_form"
                  class="bg-gray-100 rounded-full flex items-center px-3 text-sm order-2 my-4 lg:my-0">
                <label for="search-input" class="hidden"></label>
                <input id="search-input" type="text" placeholder="Поиск по сайту"
                       class="bg-gray-100 rounded-full py-1 px-1 focus:outline-none placeholder-opacity-50 flex-1 border-none focus:shadow-none focus:ring-0">
                <button type="submit" class="group focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-black group-hover:text-orange h-4 w-4"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </form>
            <x-panels.cat-menu.menu :categories="$categories"/>
        </div>
    </div>
</header>

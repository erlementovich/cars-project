<div class="block border-t clear-both w-full" data-accordion>
    <div
        class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer"
        data-accordion-toggle>
        <span>Описание</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" data-accordion-not-active>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" data-accordion-active style="display: none">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </div>
    <div class="my-4 px-4 space-y-4" data-accordion-details style="display: none">
        {!! $product->body !!}
    </div>
</div>

<div class="block border-t clear-both w-full" data-accordion data-active>
    @include('products.detail.parameters.top')
    <div class="my-4 px-4" data-accordion-details>
        <table class="w-full">
            @include('products.detail.parameters.item', ['name' => 'Салон', 'description' => $product->salon ?? null])
            @include('products.detail.parameters.item', ['name' => 'Класс', 'description' => $product->carClass->name ?? null])
            @include('products.detail.parameters.item', ['name' => 'КПП', 'description' => $product->kpp ?? null])
            @include('products.detail.parameters.item', ['name' => 'Год выпуска', 'description' => $product->year ?? null])
            @include('products.detail.parameters.item', ['name' => 'Цвет', 'description' => $product->color ?? null])
            @include('products.detail.parameters.item', ['name' => 'Кузов', 'description' => $product->carBody->name ?? null])
            @include('products.detail.parameters.item', ['name' => 'Двигатель', 'description' => $product->carEngine->name ?? null])
        </table>
    </div>
</div>

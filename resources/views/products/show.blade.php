<div class="flex-1 grid grid-cols-1 lg:grid-cols-5 border-b w-full">
    @include('products.detail.gallery')
    <div class="col-span-1 lg:col-span-2">
        <div class="space-y-4 w-full">
            @include('products.detail.cart')
            @include('products.detail.parameters.wrap')
            @include('products.detail.description')
        </div>
    </div>
</div>

<div class="col-span-3 border-r-0 sm:border-r pb-4 px-4 text-center catalog-detail-slick-preview"
     data-slick-carousel-detail>
    <div class="mb-4 border rounded" data-slick-carousel-detail-items>
        <img class="w-full" src="{{ asset($product->image->path) }}" alt="{{ $product->image->alt }}">
        @foreach($product->gallery as $image)
            <img class="w-full" src="{{ asset($image->path) }}" alt="{{ $image->alt }}" title="">
        @endforeach
    </div>
    <div class="flex space-x-4 justify-center items-center" data-slick-carousel-detail-pager>
    </div>
</div>

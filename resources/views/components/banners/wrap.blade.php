@props(['banners'])
@if($banners->isNotEmpty())
    <section class="bg-white">
        <div data-slick-carousel>
            @foreach($banners as $banner)
                <x-banners.item :banner="$banner"/>
            @endforeach
        </div>
    </section>
@endif

@props(['randomSalons' => null])

@if($randomSalons)
    <section class="block sm:flex bg-white px-4 sm:px-8 py-4">
        <div class="flex-1">
            <div>
                <p class="inline-block text-3xl text-black font-bold mb-4">Наши салоны</p>
                <span class="inline-block pl-1"> / <a href="{{ route('salons') }}"
                                                      class="inline-block pl-1 text-gray-600 hover:text-orange"><b>Все</b></a></span>
            </div>
            <div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
                @foreach($randomSalons as $salon)
                    <x-salons.card :salon="$salon"/>
                @endforeach
            </div>
        </div>
        <x-panels.footer-menu/>
    </section>
@endif

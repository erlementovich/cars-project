@extends('layouts.inner', ['wrapperClass' => 'max-w-4xl'])
@section('title', 'Салоны')

@section('content')
    <div class="w-full flex p-4">
        <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
            <img src="assets/pictures/test_salon_1.jpg" class="w-full h-full object-cover" alt="">
        </div>
        <div class="px-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <div class="text-black font-bold text-xl mb-2">Салон на братиславской</div>
                <div class="text-base space-y-2">
                    <p class="text-gray-400">Москва, ул. Братиславская, дом 23</p>
                    <p class="text-black">+7 495 987 65 43</p>
                    <p class="text-sm">Часы работы:<br> c 9.00 до 21.00</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-end bg-gray-100 p-4">
        <div class="px-4 flex flex-col justify-between leading-normal text-right">
            <div class="mb-8">
                <div class="text-black font-bold text-xl mb-2">Салон на братиславской</div>
                <div class="text-base space-y-2">
                    <p class="text-gray-400">Москва, ул. Братиславская, дом 23</p>
                    <p class="text-black">+7 495 987 65 43</p>
                    <p class="text-sm">Часы работы:<br> c 9.00 до 21.00</p>
                </div>
            </div>
        </div>
        <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
            <img src="assets/pictures/test_salon_2.jpg" class="w-full h-full object-cover" alt="">
        </div>
    </div>
    <div class="w-full flex p-4">
        <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
            <img src="assets/pictures/test_salon_1.jpg" class="w-full h-full object-cover" alt="">
        </div>
        <div class="px-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <div class="text-black font-bold text-xl mb-2">Салон на братиславской</div>
                <div class="text-base space-y-2">
                    <p class="text-gray-400">Москва, ул. Братиславская, дом 23</p>
                    <p class="text-black">+7 495 987 65 43</p>
                    <p class="text-sm">Часы работы:<br> c 9.00 до 21.00</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-end bg-gray-100 p-4">
        <div class="px-4 flex flex-col justify-between leading-normal text-right">
            <div class="mb-8">
                <div class="text-black font-bold text-xl mb-1">Салон на братиславской</div>
                <div class="text-base space-y-2">
                    <p class="text-gray-400">Москва, ул. Братиславская, дом 23</p>
                    <p class="text-black">+7 495 987 65 43</p>
                    <p class="text-sm">Часы работы:<br> c 9.00 до 21.00</p>
                </div>
            </div>
        </div>
        <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
            <img src="assets/pictures/test_salon_1.jpg" class="w-full h-full object-cover" alt="">
        </div>
    </div>
    <div class="w-full flex p-4">
        <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
            <img src="assets/pictures/test_salon_2.jpg" class="w-full h-full object-cover" alt="">
        </div>
        <div class="px-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <div class="text-black font-bold text-xl mb-2">Салон на братиславской</div>
                <div class="text-base space-y-2">
                    <p class="text-gray-400">Москва, ул. Братиславская, дом 23</p>
                    <p class="text-black">+7 495 987 65 43</p>
                    <p class="text-sm">Часы работы:<br> c 9.00 до 21.00</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="text-orange">

    <p class="text-black text-2xl font-bold mb-4">Салоны на карте</p>

    <div class="bg-gray-200">
        Карта с салонами
    </div>
@endsection

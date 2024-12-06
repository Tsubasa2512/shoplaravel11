@extends('layouts.client')
@section('slider')
    @include('layouts.client-slider')
@endsection
@section('content')
    <section class="frame-search py-8 border  border-red-500 text-center bg-gray-500">
        <h2>Khung Search</h2>
    </section>
    <section class="py-10">
        <div class="container mx-auto">
            <div class="over-list-tour">
                <div class="title--tour mb-6 flex  p-2 bg-zinc-900 text-white rounded ">
                    <h2 class="w-fit font-semibold text-2xl font-serif">
                        <x-icons.tag-white class="inline mr-1" />
                        <span>TOUR TRONG NGÀY</span>
                    </h2>
                    @include('components.client.marquee-icon-travel')
                    <a href="#" title="demo"
                        class="p-1 px-4 rounded-lg border hover:bg-gradient-to-r from-red-500 to-red-900 ">Xem tất cả
                        <x-icons.arrow-right-circle class="inline" /> </a>
                </div>
                @include('components.client.list-tour')
            </div>
        </div>
    </section>
    <section class="py-10">
        <div class="container mx-auto">
            <div class="over-list-tour">
                <div class="title--tour mb-6 flex  p-2 bg-zinc-900 text-white rounded ">
                    <h2 class="w-fit font-semibold text-2xl font-serif">
                        <x-icons.tag-white class="inline mr-1" />
                        <span>TOUR TRONG NƯỚC</span>
                    </h2>
                    @include('components.client.marquee-icon-travel')
                    <a href="#" title="demo"
                        class="p-1 px-4 rounded-lg border hover:bg-gradient-to-r from-red-500 to-red-900 ">Xem tất cả
                        <x-icons.arrow-right-circle class="inline" /> </a>
                </div>
                <ul class="flex flex-wrap w-fit m-auto mb-6">
                    <li class="mr-2"><a href="#" title="demo"
                            class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Nổi bật</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#"
                            title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Hà Nội</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#"title="demo"
                            class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Hồ Chí Minh</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#"
                            title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Đà Nẵng</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#"
                            title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Đà Lạt</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#"
                            title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Vũng Tàu</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#"
                            title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Phú Quốc</span>
                        </a>
                    </li>

                </ul>
                @include('components.client.list-tour')
            </div>
        </div>
    </section>
    <section class="py-10">
        <div class="container mx-auto">
            <div class="over-list-tour">
                <div class="title--tour mb-6 flex  p-2 bg-zinc-900 text-white rounded ">
                    <h2 class="w-fit font-semibold text-2xl font-serif">
                        <x-icons.tag-white class="inline mr-1" />
                        <span>TOUR NƯỚC NGOÀI</span>
                    </h2>
                    @include('components.client.marquee-icon-travel')
                    <a href="#" title="demo"
                        class="p-1 px-4 rounded-lg border hover:bg-gradient-to-r from-red-500 to-red-900 ">Xem tất cả
                        <x-icons.arrow-right-circle class="inline" /> </a>
                </div>
                <ul class="flex flex-wrap w-fit m-auto mb-6">
                    <li class="mr-2"><a href="#" title="demo"
                            class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Nổi bật</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#"
                            title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>ThaiLand</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#"title="demo"
                            class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Hongkong</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#"
                            title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>China</span>
                        </a>
                    </li>
                </ul>
                @include('components.client.list-tour')
            </div>
        </div>
    </section>
@endsection

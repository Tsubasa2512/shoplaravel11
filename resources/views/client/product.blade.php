@extends('layouts.client')

@section('content')
    <section class="py-10">
        <div class="container mx-auto">
            <div class="over-list-tour">
                @include('layouts.client-filter')
                <ul class="flex flex-wrap w-fit m-auto mb-6 gap-5 sm:gap-0">
                    <li class="m-0 sm:mr-2"><a href="#" title="demo"
                            class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Nổi bật</span>
                        </a>
                    </li>
                    <li class="m-0 sm:mr-2">
                        <a href="#"
                            title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Hà Nội</span>
                        </a>
                    </li>
                    <li class="m-0 sm:mr-2">
                        <a href="#"title="demo"
                            class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Hồ Chí Minh</span>
                        </a>
                    </li>
                    <li class="m-0 sm:mr-2">
                        <a href="#"
                            title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Đà Nẵng</span>
                        </a>
                    </li>
                    <li class="m-0 sm:mr-2">
                        <a href="#"
                            title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Đà Lạt</span>
                        </a>
                    </li>
                    <li class="m-0 sm:mr-2">
                        <a href="#"
                            title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                            <span>Vũng Tàu</span>
                        </a>
                    </li>
                    <li class="m-0 sm:mr-2">
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
@endsection

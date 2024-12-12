<header class="z-20 relative bg-gray-100">
    <div class="header-top shadow-xl ">
        <div class="container mx-auto p-2 flex items-center">
            <div class="left-top-header w-40">
                <h1><a href="#" title="Trang chủ"><img src="/images/logo.png" alt="demo"></a></h1>
            </div>
            <div class="center-top-header flex-1 text-center">
                <h2><a href="tel:(+84) 033 55 04 779" title="demo">
                        <img class="m-auto scale-90  hover:scale-100" src="/images/hotline.svg" alt="demo">
                    </a>
                </h2>
            </div>
            <div class="right-top-header flex-1">
                <ul class="flex flex-wrap w-fit ml-auto font-medium ">
                    <li class="w-1/3 group order-1 p-1">
                        <a href="#" class="group-hover:text-red-700" title="demo">
                            <x-icons.travel-map-location
                                class="inline-block w-8 h-8 mx-1 group-hover:scale-125" />Tour trọn gói
                        </a>
                    </li>
                    <li class="w-1/3 group order-2 p-1">
                        <a href="#" class="group-hover:text-red-700" title="demo">
                            <x-icons.day-tour class="inline-block w-8 h-8 mx-1 group-hover:scale-125" />Tour
                            trong ngày
                        </a>
                    </li>
                    <li class="w-1/3 group order-5 p-1">
                        <a href="#" class="group-hover:text-red-700" title="demo">
                            <x-icons.building-tour class="inline-block w-8 h-8 mx-1 group-hover:scale-125" />Tour
                            building
                        </a>
                    </li>
                    <li class="w-1/3 group order-4 p-1">
                        <a href="#" class="group-hover:text-red-700" title="demo">
                            <x-icons.boat-tour class="inline-block w-8 h-8 mx-1 group-hover:scale-125" />Tour du
                            thuyền
                        </a>
                    </li>
                    <li class="w-1/3 group order-3 p-1">
                        <a href="#" class="group-hover:text-red-700" title="demo">
                            <x-icons.car class="inline-block w-8 h-8 mx-1 group-hover:scale-125" />Thuê xe du
                            lịch
                        </a>
                    </li>
                    <li class="w-1/3 group order-6 p-1">
                        <a href="#" class="group-hover:text-red-700" title="demo">
                            <x-icons.hotel class="inline-block w-8 h-8 mx-1 group-hover:scale-125" />Phòng khách
                            sạn
                        </a>
                    </li>
                </ul>

            </div>
            <div class="wish-list">
                <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                </svg>
            </div>
        </div>
    </div>
    {{-- --------------------------------------- --}}
    <div class="header-bottom bg-zinc-900">
        <div class="container mx-auto">
            <ul class="flex flex-wrap items-center category-menu text-center text-white font-medium">
                <li class="flex-1 i-category-menu p-1 uppercase hover:bg-red-700 ">
                    <a class="block p-2" href="{{route('client.home')}}" title="demo"><span class="p-1 px-2">Trang Chủ</span></a>
                </li>
                <li class="flex-1 i-category-menu p-1 uppercase hover:bg-red-700">
                    <a class="block p-2" href="{{route('client.product')}}" title="demo"><span class="p-1 px-2">Tour Nội Địa</span></a>
                </li>
                <li class="flex-1 i-category-menu p-1 uppercase hover:bg-red-700">
                    <a class="block p-2" href="#" title="demo"><span class="p-1 px-2">Tour Inbound</span></a>
                </li>
                <li class="flex-1 i-category-menu p-1 uppercase hover:bg-red-700">
                    <a class="block p-2" href="#" title="demo"><span class="p-1 px-2">Tour Thailand</span></a>
                </li>
                <li class="flex-1 i-category-menu p-1 uppercase hover:bg-red-700">
                    <a class="block p-2" href="#" title="demo"><span class="p-1 px-2">Tour Hongkong</span></a>
                </li>
                <li class="flex-1 i-category-menu p-1 uppercase hover:bg-red-700">
                    <a class="block p-2" href="#" title="demo"><span class="p-1 px-2">Tour China</span></a>
                </li>
                <li class="flex-1 i-category-menu p-1 uppercase hover:bg-red-700">
                    <a class="block p-2" href="#" title="demo"><span class="p-1 px-2">Về Chúng Tôi</span></a>
                </li>
            </ul>
        </div>
    </div>
</header>

 {{-- Day tour  --}}
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
 {{-- VietNam Tour  --}}
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
 {{-- Foreign Tour --}}
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
             <ul class="flex flex-wrap w-fit m-auto mb-6 gap-5 sm:gap-0">
                 <li class="m-0 sm:mr-2"><a href="#" title="demo"
                         class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                         <span>Nổi bật</span>
                     </a>
                 </li>
                 <li class="m-0 sm:mr-2">
                     <a href="#"
                         title="demo"class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                         <span>ThaiLand</span>
                     </a>
                 </li>
                 <li class="m-0 sm:mr-2">
                     <a href="#"title="demo"
                         class="w-fit h-fit bg-gradient-to-r from-zinc-500 to-zinc-800 py-2 px-4 rounded-lg text-white font-medium  hover:from-red-900 hover:to-red-700">
                         <span>Hongkong</span>
                     </a>
                 </li>
                 <li class="m-0 sm:mr-2">
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
 {{-- Prominent location  --}}
 <section class="py-10">
     <div class="container mx-auto">
        <div class="title--tour mb-6 flex  p-2 bg-zinc-900 text-white rounded uppercase">
             <h2 class="w-fit font-semibold text-2xl font-serif">
                 <span>Điạ điểm nổi bật</span>
             </h2>
             @include('components.client.marquee-icon-travel')
         </div>
         <div class="list-prominent-location flex flex-wrap uppercase">
             {{-- item  --}}
             <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                 <a href="#" title="demo" class="block overflow-hidden rounded-2xl relative group">
                     <img src="/images/location1.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                     <h3
                         class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">
                         Hà Nội</h3>
                 </a>
             </div>
             {{-- item  --}}
             <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                 <a href="#" title="demo" class="block overflow-hidden rounded-2xl relative group">
                     <img src="/images/location2.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                     <h3
                         class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">
                         Hạ Long</h3>
                 </a>
             </div>
             {{-- item  --}}
             <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                 <a href="#" title="demo" class="block overflow-hidden rounded  relative group">
                     <img src="/images/location3.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                     <h3
                         class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">
                         Đà Nẵng</h3>
                 </a>
             </div>
             {{-- item  --}}
             <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                 <a href="#" title="demo" class="block overflow-hidden rounded-2xl relative group">
                     <img src="/images/location4.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                     <h3
                         class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">
                         Vũng Tàu</h3>
                 </a>
             </div>
             {{-- item  --}}
             <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                 <a href="#" title="demo" class="block overflow-hidden rounded-2xl relative group">
                     <img src="/images/location5.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                     <h3
                         class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">
                         Hồ Chí Minh</h3>
                 </a>
             </div>
             {{-- item  --}}
             <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                 <a href="#" title="demo" class="block overflow-hidden rounded-2xl relative group">
                     <img src="/images/location6.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                     <h3
                         class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">
                         Đà Lạt</h3>
                 </a>
             </div>
             {{-- item  --}}
             <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                 <a href="#" title="demo" class="block overflow-hidden rounded-2xl relative group">
                     <img src="/images/location7.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                     <h3
                         class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">
                         Phú Quốc</h3>
                 </a>
             </div>
             {{-- item  --}}
             <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                 <a href="#" title="demo" class="block overflow-hidden rounded-2xl relative group">
                     <img src="/images/location8.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                     <h3
                         class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">
                         Hongkong</h3>
                 </a>
             </div>
              {{-- item  --}}
            <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                <a href="#" title="demo" class="block overflow-hidden rounded-2xl relative group">
                    <img src="/images/location9.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                    <h3 class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">Bangkok</h3>
                </a>
            </div>
             {{-- item  --}}
             <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                <a href="#" title="demo" class="block overflow-hidden rounded-2xl relative group">
                    <img src="/images/location10.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                    <h3 class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">China</h3>
                </a>
            </div>
             {{-- item  --}}
             <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                <a href="#" title="demo" class="block overflow-hidden rounded-2xl relative group">
                    <img src="/images/location11.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                    <h3 class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">Macau</h3>
                </a>
            </div>
             {{-- item  --}}
             <div class="items-prominent-location text-center p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 ">
                <a href="#" title="demo" class="block overflow-hidden rounded-2xl relative group">
                    <img src="/images/location12.jpg" alt="demo" class="w-full h-full group-hover:scale-110 ">
                    <h3 class="absolute left-0 right-0 bottom-0 py-3 bg-zinc-600 text-white text-base font-bold font-serif opacity-90 mt-2 transition delay-400 group-hover:opacity-0">Phuket</h3>
                </a>
            </div>
         </div>
     </div>
 </section>

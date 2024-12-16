@extends('layouts.client')
@section('slider')
    @include('layouts.client-slider')
@endsection
@section('content')
    {{-- Search  --}}
    <section class="frame-search py-10 bg-gradient-to-r  from-red-700 from-10% via-zinc-600 via-30% to-zinc-900  to-50%">
        <div class="container mx-auto">
            @include('layouts.client-search')
        </div>
    </section>
    @include('layouts.temp')
    {{-- <section class="intro-about mt-6 text-white bg-gradient-to-r from-red-800 from% via-zinc-600 via-100%">
        <div class="container mx-auto">
            <div class="over-intro-about py-10 ">
                <div class="border content-intro-about text-center p-8 rounded-xl shadow-2xl md:w-4/5 mx-auto">
                    <h2 class="text-lg font-semibold uppercase">Triết lý dẫn dắt chúng tôi</h2>
                    <span class="opacity-60">-------------</span>
                    <label class=" block font-semibold  font-serif text-2xl my-2">" Your Dreams, Our Priority "</label>
                    <div class="text-intro-about font-mono text-base mt-4 w-4/5 mx-auto">
                        <p class="mb-3">Chúng tôi tin rằng du lịch không chỉ là ghé thăm những địa điểm mới mà còn là trải nghiệm những
                            nền văn hóa, ẩm thực và phong cảnh mới. Đó là về việc biến ước mơ của bạn thành hiện thực.</p>
                        <p class="mb-3">Chúng tôi hiểu rằng mỗi du khách là duy nhất, có ước mơ và khát vọng riêng. Đó là lý do tại sao
                            chúng tôi ưu tiên ước mơ của bạn, tạo ra các hành trình được cá nhân hóa để đáp ứng sở thích và
                            mong muốn cụ thể của bạn.
                            Chúng tôi cố gắng mang đến một hành trình khó quên, đảm bảo mọi chi tiết đều được chăm chút kỹ
                            lưỡng để bạn có thể tập trung đắm mình vào trải nghiệm.</p>
                        <p class="mb-3">Cam kết của chúng tôi trong việc ưu tiên những giấc mơ của bạn khiến chúng tôi trở nên khác biệt,
                            khi chúng tôi nỗ lực hết mình để biến giấc mơ du lịch của bạn thành hiện thực. Bởi vì vào cuối
                            ngày, ước mơ của bạn là ưu tiên hàng đầu của chúng tôi.</p>
                    </div>
                    <div class="img-intro-about flex mt-8 mx-auto w-fit gap-8">
                        <div class="w-fit rounded-full overflow-hidden">
                            <img src="/images/vietnam.jpg" alt="demo" class="w-24  h-24">
                        </div>
                        <div class="w-fit rounded-full overflow-hidden">
                            <img src="/images/thailand.jpg" alt="demo" class="w-24  h-24">
                        </div>
                        <div class="w-fit rounded-full overflow-hidden">
                            <img src="/images/hongkong.jpg" alt="demo" class="w-24  h-24">
                        </div>
                        <div class="w-fit rounded-full overflow-hidden">
                            <img src="/images/china.jpg" alt="demo" class="w-24  h-24">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
@endsection

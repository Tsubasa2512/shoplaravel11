<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OM Tours Viet Nam</title>
    @vite('resources/css/client/style.css')
    @vite('resources/js/client/script.js')
</head>

<body class="bg-gray-100 font-sans  leading-normal tracking-normal relative overflow-x-hidden ">
    @include('layouts.client-header')
    @yield('slider')
    <main id="show-content-client">
        @yield('content')
    </main>
    @include('layouts.client-footer')
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        console.log('Swiper initialized:', swiper);
    });
</script>

</html>

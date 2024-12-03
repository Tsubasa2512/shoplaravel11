<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OM Tours Viet Nam</title>
    @vite('resources/css/client/style.css')
    @vite('resources/js/client/script.js')
</head>

<body class="bg-gray-100 font-sans  leading-normal tracking-normal relative overflow-hidden">
    @include('layouts.client-header')
    <div id="show-content-client">
        @yield('content')
    </div>
    @include('layouts.client-footer')
</body>
</html>


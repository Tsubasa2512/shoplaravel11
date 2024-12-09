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
@endsection

@extends('layouts.client')
@section('slider')
    @include('layouts.client-slider')
@endsection
@section('content')
    <section class="py-10">
        <div class="container mx-auto">
            <div class="over-list-tour mt-8">
                <div class="title--tour mb-6">
                    <h2 class="text-center font-semibold text-2xl font-serif">TOUR NỔI BẬT</h2>
                    <label class="block m-auto text-center w-1/5 overflow-hidden h-5">
                        ------------------------------------------------------------------------------
                    </label>
                </div>
               @include('components.client.list-tour')
            </div>
        </div>
    </section>
@endsection

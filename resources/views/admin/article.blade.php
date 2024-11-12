@extends('layouts.admin')


@section('content')
    <div class="relative ">
        <div class="absolute top-0 left-0  ">
            <a href="{{ route('admin.article.add') }}" title="Create Article"
                 class="flex place-items-center  p-2 font-semibold text-zinc-50 bg-green-500  rounded hover:shadow-lg hover:shadow-green-300 hover:scale-95">
                <span>Create Article</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 inline ml-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </a>
        </div>
    </div>

@endsection

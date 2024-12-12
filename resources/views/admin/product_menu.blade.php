@extends('layouts.admin')

@section('content')
    @if (session('success') || session('error'))
        <div class="alert--admin alert-success">
            <label>{{ session('success') . session('error') }}</label>
            {{ session()->forget('success') . session()->forget('error') }}
        </div>
    @endif

    {{-- ---------------------------------------------------- --}}
    <div class="container--admin ">
        {{-- Frame Add Category  --}}
        <div class="frame--add--admin">
            <a href="{{ route('admin.product-menu.add') }}" title="Create Product Menu"
                class="w-fit flex place-items-center py-1 px-2 font-semibold text-zinc-50 bg-green-500  rounded hover:shadow-lg hover:shadow-green-300 hover:scale-95">
                <span>New product Menu</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 inline ml-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </a>
        </div>
        {{-- Frame List Categories  --}}
        <div class="frame--list--admin border-t mt-4 p-3">
            <table class="table-auto w-full border-collapse text-center mb-6 ">
                <caption class="caption-top p-3 font-bold my-3 uppercase text-sky-500">
                    Table product Menu
                </caption>
                <thead>
                    <tr>
                        <th class="border  border-gray-300 p-2">
                            <input type="checkbox" name="checkAll" id="checkAll" class="size-5 block m-auto">
                        </th>
                        <th class="border  border-gray-300 p-2 w-36">Index</th>
                        <th class="border  border-gray-300 p-2" colspan="2">Name</th>
                        <th class="border  border-gray-300 p-2">Image</th>
                        <th class="border  border-gray-300 p-2">Category</th>
                        <th class="border  border-gray-300 p-2">Parent</th>
                        <th class="border  border-gray-300 p-2">Status</th>
                        <th class="border  border-gray-300 p-2">Featured</th>
                        <th class="border  border-gray-300 p-2">Modified</th>
                        <th class="border  border-gray-300 p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productMenu as $item)
                        @include('admin.row.product_menu')
                        {{-- --------------------- --}}
                        @foreach ($item->children as $item)
                            @include('admin.row.product_menu')
                        @endforeach
                        {{-- --------------------- --}}
                    @endforeach
                </tbody>
            </table>
            {{-- //Group button is at the bottom of the tables  --}}
            <div class="group-button-table--admin">
                <nav class="flex gap-x-4 ">
                    <button
                        class="w-fit flex place-items-center py-2 px-3 font-semibold text-zinc-50 bg-green-500  rounded hover:shadow-lg hover:shadow-green-300 hover:scale-95">
                        <svg class="w-6 h-6 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2"
                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span>Status: Active</span>
                    </button>
                    <button
                        class="w-fit flex place-items-center py-2 px-3 font-semibold text-zinc-50 bg-yellow-500  rounded hover:shadow-lg hover:shadow-yellow-300 hover:scale-95">
                        <svg class="w-6 h-6 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                        </svg>
                        <span>Featured: Active</span>
                    </button>
                    <button
                        class="w-fit flex place-items-center py-2 px-3 font-semibold text-zinc-50 bg-red-500  rounded hover:shadow-lg hover:shadow-red-300 hover:scale-95">
                        <svg class="w-6 h-6 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="size-8 fill-red-600 ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        <span>Remove</span>
                    </button>
                </nav>
            </div>
        </div>

    </div>
    {{-- ---------------------------------------------------- --}}
@endsection

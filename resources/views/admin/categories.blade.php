@extends('layouts.admin')

@section('content')
    @if (session('success'))
        <div class="alert--admin alert-success">
            <label>{{ session('success') }}</label>
            {{ session()->forget('success') }}
        </div>
    @endif

    {{-- ---------------------------------------------------- --}}
    <div class="container--admin ">
        {{-- Frame Add Category  --}}
        <div class="frame--add--admin">
            <a href="{{ route('admin.categories.add') }}" title="Create Category"
                class="w-fit flex place-items-center py-1 px-2 font-semibold text-zinc-50 bg-green-500  rounded hover:shadow-lg hover:shadow-green-300 hover:scale-95">
                <span>New Category</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 inline ml-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </a>
        </div>
        {{-- Frame List Categories  --}}
        <div class="frame--list--admin border-t mt-4 p-3">
            <table class="table-auto w-full border-collapse text-center">
                {{-- <caption class="caption-top">
                    Table Categories.
                </caption> --}}
                <thead>
                    <tr>
                        <th></th>
                        <th class="border  border-sky-500">Index Menu</th>
                        <th class="border  border-sky-500">Name</th>
                        <th class="border  border-sky-500">Image</th>
                        <th class="border  border-sky-500">Type Category</th>
                        <th class="border  border-sky-500">Status</th>
                        <th class="border  border-sky-500">Modified</th>
                        <th class="border  border-sky-500">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border  border-sky-500"> <input type="checkbox" name="" id=""> </td>
                        <td class="border  border-sky-500">1</td>
                        <td class="border  border-sky-500">Product</td>
                        <td class="border  border-sky-500">Yes</td>
                        <td class="border  border-sky-500">Product</td>
                        <td class="border  border-sky-500">Active</td>
                        <td class="border  border-sky-500">11/14/2024 - 4h55</td>
                        <td class="border  border-sky-500">
                            <button>Edit</button>
                            <button>Remove</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
    {{-- ---------------------------------------------------- --}}
@endsection

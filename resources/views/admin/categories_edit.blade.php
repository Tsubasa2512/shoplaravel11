@extends('layouts.admin')
@section('content')
    {{-- ------------------------------------------ --}}
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data"
        class="form flex flex-col">
        {{-- {{ $category->id }} --}}
        {{ csrf_field() }}
        <input type="hidden" name="time" value="{{ time() }}">
        <div class="box--data-admin flex mb-4 text-sm  items-center">
            <label class="w-40 font-semibold">Name </label>
            <input type="text" name="name" required maxlength="255" value="{{ $category->name }}"
                class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 ">
        </div>
        <div class="box--data-admin flex mb-4 text-sm  items-center">
            <label class="w-40 font-semibold">Link</label>
            <input type="text" name="slug" maxlength="255" placeholder="If empty -> auto-generate"
                value="{{ $category->slug }}"
                class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                class="auto--slug size-10 fill-sky-500 ml-6  mr-2 mb-1 cursor-pointer hover:scale-125">

                <path
                    d="M403.8 34.4c12-5 25.7-2.2 34.9 6.9l64 64c6 6 9.4 14.1 9.4 22.6s-3.4 16.6-9.4 22.6l-64 64c-9.2 9.2-22.9 11.9-34.9 6.9s-19.8-16.6-19.8-29.6l0-32-32 0c-10.1 0-19.6 4.7-25.6 12.8L284 229.3 244 176l31.2-41.6C293.3 110.2 321.8 96 352 96l32 0 0-32c0-12.9 7.8-24.6 19.8-29.6zM164 282.7L204 336l-31.2 41.6C154.7 401.8 126.2 416 96 416l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c10.1 0 19.6-4.7 25.6-12.8L164 282.7zm274.6 188c-9.2 9.2-22.9 11.9-34.9 6.9s-19.8-16.6-19.8-29.6l0-32-32 0c-30.2 0-58.7-14.2-76.8-38.4L121.6 172.8c-6-8.1-15.5-12.8-25.6-12.8l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c30.2 0 58.7 14.2 76.8 38.4L326.4 339.2c6 8.1 15.5 12.8 25.6 12.8l32 0 0-32c0-12.9 7.8-24.6 19.8-29.6s25.7-2.2 34.9 6.9l64 64c6 6 9.4 14.1 9.4 22.6s-3.4 16.6-9.4 22.6l-64 64z" />
            </svg> --}}
        </div>
        <div class="box--data-admin flex mb-4 text-sm  items-center">
            <label class="w-40 font-semibold">Type Category</label>
            <select name="type_id" required
                class="p-2 px-2 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                @foreach ($categoryTypes as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $category->type_id ? 'selected' : '' }}>
                        {{ $item->type_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="box--data-admin flex mb-4 text-sm  items-center">
            <label class="w-40 font-semibold">Index Menu </label>
            <input type="text" name="index_menu" maxlength="5" value="{{ $category->index_menu }}"
                class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 ">
        </div>
        <div class="box--data-admin flex mt-2 mb-4 text-sm  items-center">
            <label class="w-40 font-semibold">Image</label>
            <input type="file" name="image"
                class="flex-1 p-1 pl-0 shadow-lg rounded text-sm text-slate-500 file:mr-4 file:py-2 file:px-4   file:rounded-full file:border-0  file:font-semibold  file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100">
        </div>
        @if ($category->image)
            <div class="box--data-admin flex mt-2 mb-4 text-sm  items-center">
                <label class="w-40 font-semibold"></label>
                <div class="show--image">
                    <input type="hidden" name="image_old" value="{{ $category->image }}">
                    <p class="text-sm text-gray-500 mb-4">Current File: {{ $category->image }}</p>
                    <div class="p-3 shadow-lg w-fit rounded border border-sky-500">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image"
                            class="w-28 h-28 object-cover ">
                    </div>
                    <input type="checkbox" name="no_image" class="mt-4 w-5 h-5"> <label class="ml-2">No Image
                        (Remove)</label>
                </div>

            </div>
        @endif
        <div class="box--data-admin ">
            <div class="flex mt-2 mb-4 text-sm  items-center">
                <label class="inline-flex items-center mb-5 cursor-pointer">
                    <span class="w-40 font-semibold">Display</span>
                    <input name="show" type="checkbox" class="sr-only peer " value="{{ $category->show }}"
                        {{ $category->show ? 'checked' : '' }}>
                    <div
                        class="outline-none ring-4 ring-blue-300 relative w-16 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700
                            peer-checked:after:translate-x-10 rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white
                            after:content-[''] after:absolute after:top-0 after:start-0after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>
            <div class="flex mt-2 mb-4 text-sm  items-center">
                <label class="inline-flex items-center mb-5 cursor-pointer">
                    <span class="w-40 font-semibold">Featured</span>
                    <input name="featured" type="checkbox" class="sr-only peer" value="{{ $category->featured }}"
                        {{ $category->featured ? 'checked' : '' }}>
                    <div
                        class="outline-none ring-4 ring-blue-300 relative w-16 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700
                            peer-checked:after:translate-x-10 rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white
                            after:content-[''] after:absolute after:top-0 after:start-0after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>
        </div>
        <div class="box--data-admin flex mb-4 text-sm items-center">
            <label class="w-40 font-semibold">Description</label>
            <textarea name="description"
                class="p-1 px-4 h-36 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">{{ $category->description }}</textarea>
        </div>
        <div class="box-btn--save flex mt-3">
            <button
                class="w-fit flex place-items-center py-1 px-2 font-semibold text-zinc-50 bg-green-500  rounded hover:shadow-lg hover:shadow-green-300 hover:scale-95"
                type="submit">Update</button>
            <button
                class="w-fit flex place-items-center py-1 px-2  ml-3 font-semibold text-zinc-50 bg-blue-500  rounded hover:shadow-lg hover:shadow-blue-300 hover:scale-95"
                type="reset">Refresh</button>
            <a href="{{ route('admin.categories') }}" title="Categories"
                class="w-fit flex place-items-center py-1 px-2  ml-3 font-semibold text-zinc-50 bg-yellow-500  rounded hover:shadow-lg hover:shadow-yellow-300 hover:scale-95"
                type="button">Exit</a>
        </div>
    </form>
    {{-- ------------------------------------------ --}}
@endsection

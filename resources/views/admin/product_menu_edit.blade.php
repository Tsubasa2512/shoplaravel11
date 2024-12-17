@extends ('layouts.admin')
@section('content')
    {{-- ------------- --}}
    <div class="container-add-admin p-4">

        <form action="{{ route('admin.product-menu.update', $productMenu->id) }}" method="POST" enctype="multipart/form-data"
            class="form flex flex-col">
            {{ csrf_field() }}
            <div class="box--data-admin flex mb-4 text-sm  items-center">
                <label class="w-40 font-semibold">Name </label>
                <input type="text" name="name" required maxlength="255" value="{{ $productMenu->name }}"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 ">
            </div>
            <div class="box--data-admin flex mb-4 text-sm  items-center">
                <label class="w-40 font-semibold">Link</label>
                <input type="text" name="slug" maxlength="255" placeholder="If empty -> auto-generate"
                    value="{{ $productMenu->slug }}"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
            </div>
            <div class="box--data-admin flex mb-4 text-sm  items-center">
                <label class="w-40 font-semibold">Name Category</label>
                <select name="category_id" required
                    class="p-2 px-2 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $productMenu->category_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="box--data-admin flex mb-4 text-sm  items-center">
                <label class="w-40 font-semibold">Parent</label>
                <select name="parent_id" required
                    class="p-2 px-2 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                    <option value="0">None</option>
                    @foreach ($parents as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $productMenu->parent_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="box--data-admin flex mb-4 text-sm  items-center">
                <label class="w-40 font-semibold">Index Menu </label>
                <input type="text" name="index_menu" maxlength="5" value="{{ $productMenu->index_menu }}"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 ">
            </div>
            <div class="box--data-admin flex mt-2 mb-4 text-sm  items-center">
                <label class="w-40 font-semibold">Image</label>
                <input type="file" name="image"
                    class="flex-1 p-1 pl-0 shadow-lg rounded text-sm text-slate-500 file:mr-4 file:py-2 file:px-4   file:rounded-full file:border-0  file:font-semibold  file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100">
            </div>

            @if ($productMenu->image)
                <div class="box--data-admin flex mt-2 mb-4 text-sm  items-center">
                    <label class="w-40 font-semibold"></label>
                    <div class="show--image">
                        <input type="hidden" name="image_old" value="{{ $productMenu->image }}">
                        <p class="text-sm text-gray-500 mb-4">Current File: {{ $productMenu->image }}</p>
                        <div class="p-3 shadow-lg w-fit rounded border border-sky-500">
                            <img src="{{ asset('storage/' . $productMenu->image) }}" alt="Category Image"
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
                        <input name="show" type="checkbox"class="sr-only peer " value="{{ $productMenu->show }}"
                            {{ $productMenu->show ? 'checked' : '' }}>
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
                        <input name="featured" type="checkbox" class="sr-only peer " value="{{ $productMenu->featured }}"
                            {{ $productMenu->featured ? 'checked' : '' }}>
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
                    class="p-1 px-4 h-36 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">{{ $productMenu->description }}</textarea>
            </div>
            <div class="box-btn--save flex mt-3">
                <button
                    class="w-fit flex place-items-center py-1 px-2 font-semibold text-zinc-50 bg-green-500  rounded hover:shadow-lg hover:shadow-green-300 hover:scale-95"
                    type="submit">Update</button>
                <button
                    class="w-fit flex place-items-center py-1 px-2  ml-3 font-semibold text-zinc-50 bg-blue-500  rounded hover:shadow-lg hover:shadow-blue-300 hover:scale-95"
                    type="reset">Refresh</button>
                <a href="{{ route('admin.product-menu') }}" title="Product Menu"
                    class="w-fit flex place-items-center py-1 px-2  ml-3 font-semibold text-zinc-50 bg-yellow-500  rounded hover:shadow-lg hover:shadow-yellow-300 hover:scale-95"
                    type="button">Exit</a>
            </div>
        </form>
    </div>
    {{-- ------------- --}}
@endsection

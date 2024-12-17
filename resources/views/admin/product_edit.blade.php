@extends ('layouts.admin')
@section('content')
    {{-- ------------- --}}
    <div class="container-add-admin p-4">

        <form action="{{ route('admin.product.add') }}" method="POST" enctype="multipart/form-data" class="form flex flex-col">
            {{ csrf_field() }}
            <input type="hidden" name="time" value="{{ time() }}">
            <div class="box--data-admin flex mb-4 text-sm  items-center">
                <label class="w-40 font-semibold">Name </label>
                <input type="text" name="name" required maxlength="255"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 ">
            </div>
            <div class="box--data-admin flex mb-4 text-sm  items-center">
                <label class="w-40 font-semibold">Link</label>
                <input type="text" name="slug" maxlength="255" placeholder="If empty -> auto-generate"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">

            </div>
            <div class="box--data-admin flex mb-4 text-sm  items-center">
                <label class="w-40 font-semibold">Product Menu</label>
                <select name="menu_id" required
                    class="p-2 px-2 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                    @foreach ($productMenu as $item)
                        <option value="{{ $item->id }}" @if ($item->id == request('menu')) selected @endif>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="box--data-admin flex mt-2 mb-4 text-sm  items-center">
                <label class="w-40 font-semibold">Image</label>
                <input type="file" name="image"
                    class="flex-1 p-1 pl-0 shadow-lg rounded text-sm text-slate-500 file:mr-4 file:py-2 file:px-4   file:rounded-full file:border-0  file:font-semibold  file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100">
            </div>
            <div class="box--data-admin ">
                <div class="flex mt-2 mb-4 text-sm  items-center">
                    <label class="inline-flex items-center mb-5 cursor-pointer">
                        <span class="w-40 font-semibold">Display</span>
                        <input name="show" type="checkbox" value="1" class="sr-only peer " checked>
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
                        <input name="featured" type="checkbox" value="1" class="sr-only peer ">
                        <div
                            class="outline-none ring-4 ring-blue-300 relative w-16 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700
                                peer-checked:after:translate-x-10 rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white
                                after:content-[''] after:absolute after:top-0 after:start-0after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                    </label>
                </div>
            </div>
            {{-- -------------------------------- --}}
            <div class="box--data-admin flex mb-4 text-sm flex-wrap  items-center">
                <div class="box-data-admin-2 flex  items-center w-full mb-4 lg:mb-0 lg:w-1/2">
                    <label class="w-40 font-semibold block">Departure</label>
                    <select name="departure_from"
                        class="p-2 px-2 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        <option value="">None</option>
                        @foreach ($location as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="box-data-admin-2 flex items-center  w-full  lg:w-1/2 ">
                    <label class="w-40 font-semibold block lg:text-right lg:mr-6">Destination</label>
                    <select name="destination"
                        class="p-2 px-2 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        <option value="">None</option>
                        @foreach ($location as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="box--data-admin flex mb-4 text-sm flex-wrap  items-center">
                <div class="box-data-admin-2 flex  items-center w-full mb-4 lg:mb-0 lg:w-1/2">
                    <label class="w-40 font-semibold block">Duration</label>
                    <select name="duration"
                        class="p-2 px-2 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        <option value="">None</option>
                        @foreach ($duration as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="box-data-admin-2 flex items-center  w-full  lg:w-1/2 ">
                    <label class="w-40 font-semibold block lg:text-right lg:mr-6">Type Tour</label>
                    <select name="tour_type"
                        class="p-2 px-2 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        <option value="">None</option>
                        @foreach ($typeTour as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="box--data-admin flex mb-4 text-sm flex-wrap  items-center">
                <div class="box-data-admin-2 flex  items-center w-full mb-4 lg:mb-0 lg:w-1/2">
                    <label class="w-40 font-semibold block">Departure Date</label>
                    <input type="date" name="departure_date" maxlength="255"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">

                </div>
                <div class="box-data-admin-2 flex items-center  w-full  lg:w-1/2 ">
                    <label class="w-40 font-semibold block lg:text-right lg:mr-6">Transportation</label>
                    <input type="text" name="transportation"  maxlength="255"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 ">
                </div>
            </div>
            <div class="box--data-admin flex mb-4 text-sm flex-wrap  items-center">
                <div class="box-data-admin-2 flex  items-center w-full mb-4 lg:mb-0 lg:w-1/2">
                    <label class="w-40 font-semibold block">Price</label>
                    <input type="text" name="price"  maxlength="255"  oninput="formatCurrency(this)"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 ">
                </div>
                <div class="box-data-admin-2 flex items-center  w-full  lg:w-1/2 ">
                    <label class="w-40 font-semibold block lg:text-right lg:mr-6">Sale Price</label>
                    <input type="text" name="sale_price"  maxlength="255"  oninput="formatCurrency(this)"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 ">
                </div>
            </div>
            {{-- -------------------------------- --}}
            <div class="box--data-admin flex mb-4 text-sm items-center">
                <label class="w-40 font-semibold">Description</label>
                <textarea name="description"
                    class="p-1 px-4 h-24 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"></textarea>
            </div>
            <div class="box--data-admin flex mb-4 text-sm items-center">
                <label class="w-40 font-semibold">Schedule</label>
                <textarea name="schedule"
                    class="p-1 px-4 h-64 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"></textarea>
            </div>
            <div class="box-btn--save">
                <button
                    class="w-fit flex place-items-center py-1 px-2 font-semibold text-zinc-50 bg-green-500  rounded hover:shadow-lg hover:shadow-green-300 hover:scale-95"
                    type="submit">Add Data</button>
            </div>
        </form>
    </div>
    {{-- ------------- --}}
@endsection

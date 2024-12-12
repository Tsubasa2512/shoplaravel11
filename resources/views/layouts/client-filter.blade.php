<div class="filter-tour mb-10">
    <form action="{{ route('client.product') }}" method="GET"
        class="text-center rounded-lg shadow-md  border-t border-zinc-400 p-2 py-6 shadow-zinc-600">
        <x-icons.location class="inline w-8 h-8" />
        <select name="departure " id="departure" required class="p-3 rounded-lg shadow-lg w-1/6 mx-2  border border-transparent hover:border-red-700">">
            <option value="">Điểm khởi hành</option>
            <optgroup label="Trong nước">
                <option value="1">Hà Nội</option>
                <option value="2">Đà Nẵng</option>
                <option value="3">Hồ Chí Minh</option>
            </optgroup>
            <optgroup label="Thailand">
                <option value="4">Bangkok</option>
                <option value="5">Phuket</option>
            </optgroup>
            <option value="6">China</option>
            <option value="7">Hongkong</option>
        </select>
        <x-icons.location class="inline w-8 h-8 " />
        <select name="destination" id="destination" required class="p-3 rounded-lg shadow-lg w-1/6 mx-2 border border-transparent hover:border-red-700">">
            <option value="">Điểm đến</option>
            <optgroup label="Trong nước">
                <option value="1">Hà Nội</option>
                <option value="2">Đà Nẵng</option>
                <option value="3">Hồ Chí Minh</option>
            </optgroup>
            <optgroup label="Thailand">
                <option value="4">Bangkok</option>
                <option value="5">Phuket</option>
            </optgroup>
            <option value="6">China</option>
            <option value="7">Hongkong</option>
        </select>
        <x-icons.time class="inline w-8 h-8 " />
        <select name="time" id="time"
            class="p-3 rounded-lg shadow-lg w-1/6 mx-2 border border-transparent hover:border-red-700">">
            <option value="">Thời gian</option>
            <option value="1">1 Ngày</option>
            <option value="2">2 Ngày 1 Đêm</option>
            <option value="3">3 Ngày 2 Đêm</option>
            <option value="4">4 Ngày 3 Đêm</option>
            <option value="5">5 Ngày 4 Đêm</option>
            <option value="6">6 Ngày 5 Đêm</option>
        </select>
        <x-icons.tag class="inline w-8 h-8 " />
        <select name="type" id="type" required class="p-3 rounded-lg shadow-lg w-1/6 mx-2 border border-transparent hover:border-red-700">
            <option value="1">Loại Tour</option>
            <option value="2">Tour tết</option>
            <option value="3">Tour Trong ngày</option>
            <option value="4">Tour du thuyền</option>
            <option value="5">Tour building</option>
            <option value="6">Tour khuyến mãi</option>
        </select>
        <button
            class=" border font-semibold border-white p-2.5 rounded-lg shadow-lg w-1/7 text-white mx-2 bg-gradient-to-l from-red-400 to-red-800 hover:scale-95 hover:bg-gradient-to-r">
            <span class="text-lg ">Filter</span>
            <x-icons.filter class="inline ml-1 -mt-1" />
        </button>
    </form>
</div>

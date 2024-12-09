<div class="search-tour">
    <form action="{{ route('client.search') }}" method="GET" class="text-center">
        <select name="departure " id="departure" required class="p-3 rounded-lg shadow-lg w-1/4 mx-2  border border-transparent hover:border-red-700">">
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

        <select name="destination" id="destination" required class="p-3 rounded-lg shadow-lg w-1/4 mx-2 border border-transparent hover:border-red-700">">
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
        <select name="type" id="type" required class="p-3 rounded-lg shadow-lg w-1/5 mx-2 border border-transparent hover:border-red-700">
            <option value="1">Loại Tour</option>
            <option value="2">Tour tết</option>
            <option value="3">Tour Trong ngày</option>
            <option value="4">Tour du thuyền</option>
            <option value="5">Tour building</option>
            <option value="6">Tour khuyến mãi</option>
        </select>
        <button class="text-white border font-semibold border-white p-2.5 rounded-lg shadow-lg w-1/6  mx-2 hover:bg-gradient-to-r from-red-500 to-red-900 ">
            <span class="text-lg " >Search</span>
            <x-icons.search-white class="inline ml-1" />
        </button>
    </form>
</div>

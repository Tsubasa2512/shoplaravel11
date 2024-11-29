<tr>
    <td class="border  border-gray-300 p-1">
        <input type="checkbox" name="item_remove[]" value="{{ $item->id }}" class="size-5 block m-auto">
    </td>
    <td class="border  border-gray-300 p-1 w-36 font-semibold ">{{ $item->id }}</td>
    <td class="border  border-gray-300 p-1 px-2">{{ $item->name }}</td>
    <td class="border  border-gray-300 p-1 px-2">{{ $item->phone }}</td>
    <td class="border  border-gray-300 p-1 px-2">{{ $item->email }}</td>
    <td class="border  border-gray-300 p-1 px-2">{{ $item->role->name }}</td>
    <td class="border  border-gray-300 p-1">
        @if ($item->active)
            <x-icons.eye class="w-6 h-6 text-green-600 inline -ml-3" />
            <span class="text-green-600 ml-1">Active</span>
        @else
            <x-icons.eye-ban class="w-6 h-6  inline" />
            <span class="ml-1">Inactive</span>
        @endif

    </td>

    <td class="border  border-gray-300 p-1">{{ $item->updated_at }}</td>
    <td class="border  border-gray-300 p-1">
        <a href ="{{ route('admin.user-management.edit', ['id' => $item->id]) }}" title="Edit Category"
            class="inline-block hover:opacity-70 hover:scale-125 ">
            <x-icons.edit class="size-7 fill-sky-600 " />
        </a>
        <form action="{{ route('admin.user-management.delete', $item->id) }}" method="POST" class=" inline-block">
            @csrf
            @method('DELETE')
            <button title="Remove" name="Remove" value="{{ $item->id }}"
                class="ml-4 hover:opacity-80 hover:scale-125">
                <x-icons.remove class="size-8 fill-red-600" />
            </button>
        </form>
    </td>
</tr>

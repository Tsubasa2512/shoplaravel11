<tr>
    <td class="border  border-gray-300 p-1">
        <input type="checkbox" name="item_remove[]" value="{{ $item->id }}" class="size-5 block m-auto">
    </td>
    <td class="border  border-gray-300 p-1 w-36 font-semibold ">{{ $item->index_menu }}</td>
    <td colspan="2" class="border  border-gray-300 p-1 px-2 text-left">
        @if ($item->parent_id > 0)
            <x-icons.chevron-double-right class="inline-block w-3 h-3 mx-2" />
        @endif
        {{ $item->name }}
    </td>

    <td class="border  border-gray-300 p-1 px-2">
        @if ($item->image)
            <x-icons.check class="w-7 h-7 text-green-600 inline" />
        @else
            <x-icons.ban class="w-7 h-7 inline" />
        @endif
    </td>
    <td class="border  border-gray-300 p-1 px-2">{{ $item->category->name }}</td>
    <td class="border  border-gray-300 p-1 px-2">
        @if ($item->parent_id)
            {{ $item->parent->name }}
        @endif
    </td>
    <td class="border  border-gray-300 p-1">
        @if ($item->show)
            <x-icons.eye class="w-6 h-6 text-green-600 inline -ml-3" />
            <span class="text-green-600 ml-1">Active</span>
        @else
            <x-icons.eye-ban class="w-6 h-6  inline" />
            <span class="ml-1">Hidden</span>
        @endif
    </td>
    <td class="border  border-gray-300 p-1">
        @if ($item->featured)
            <x-icons.star-solid class="w-6 h-6 fill-yellow-500 inline" />
            <span class="text-yellow-500 ml-1">Active</span>
        @else
            <x-icons.star-outline class="w-6 h-6 inline" />
            <span class="ml-1">None </span>
        @endif
    </td>
    <td class="border  border-gray-300 p-1">{{ $item->updated_at }}</td>
    <td class="border  border-gray-300 p-1">
        <a href ="{{ route('admin.article', ['menu' => $item->id]) }}" title="Access Article list"
            class="inline-block hover:opacity-70  hover:scale-125 ">
            <x-icons.arrow-right-circle class="size-7 w-7 h-7 fill-green-600" />
        </a>
        <a href ="{{ route('admin.article-menu.edit', ['id' => $item->id]) }}" title="Edit Article Menu"
            class="inline-block ml-4 hover:opacity-70 hover:scale-125 ">
            <x-icons.edit class="size-7 fill-sky-600 " />
        </a>
        <form action="{{ route('admin.article-menu.delete', $item->id) }}" method="POST" class=" inline-block">
            @csrf
            @method('DELETE')
            <button title="Remove" name="Remove" value="{{ $item->id }}"
                class="ml-4 hover:opacity-80 hover:scale-125">
                <x-icons.remove class="size-8 fill-red-600" />
            </button>
        </form>

    </td>
</tr>

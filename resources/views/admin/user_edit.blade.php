@extends ('layouts.admin')
@section('content')
    {{-- ------------- --}}
    <div class="container-add-admin p-4">

        <form action="{{ route('admin.user-management.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="form flex flex-col">
            {{ csrf_field() }}
            <div class="box--data-admin flex mb-4 text-lg  items-center">
                <label class="w-40 font-semibold">Name </label>
                <input type="text" name="name" required maxlength="255" value="{{ $user->name }}"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 ">
            </div>
            <div class="box--data-admin flex mb-4 text-lg  items-center">
                <label class="w-40 font-semibold">Phone</label>
                <input type="text" name="phone" maxlength="255" required value="{{ $user->phone }}"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
            </div>
            <div class="box--data-admin flex mb-4 text-lg  items-center">
                <label class="w-40 font-semibold">Email</label>
                <input type="text" name="email" maxlength="255" required value="{{ $user->email }}"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
            </div>
            <div class="box--data-admin flex mb-4 text-lg  items-center">
                <label class="w-40 font-semibold">Roles</label>
                <select name="role_id" required
                    class="p-2 px-2 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                    @foreach ($roleUser as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $user->role_id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex mt-2 mb-2 text-lg  items-center">
                <label class="inline-flex items-center mb-5 cursor-pointer">
                    <span class="w-40 font-semibold">Status</span>
                    <input name="active" type="checkbox" value="1" class="sr-only peer"
                    {{ $user->active ? 'checked' : '' }}>
                    <div
                        class="outline-none ring-4 ring-blue-300 relative w-16 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700
                                peer-checked:after:translate-x-10 rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white
                                after:content-[''] after:absolute after:top-0 after:start-0after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>
            <div class="box--data-admin flex mb-4 text-lg  items-center">
                <label class="w-40 font-semibold">Password</label>
                <input type="password" name="password" maxlength="255"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
            </div>
            <div class="box--data-admin flex mb-4 text-lg  items-center">
                <label class="w-40 font-semibold">Password Confirmation</label>
                <input type="password" name="password_confirmation" maxlength="255"
                    class="p-1 px-4 flex-1 shadow-lg rounded focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
            </div>
            <div class="box-btn--save flex mt-3">
                <button
                    class="w-fit flex place-items-center py-1 px-2 font-semibold text-zinc-50 bg-green-500  rounded hover:shadow-lg hover:shadow-green-300 hover:scale-95"
                    type="submit">Update</button>
                <button
                    class="w-fit flex place-items-center py-1 px-2  ml-3 font-semibold text-zinc-50 bg-blue-500  rounded hover:shadow-lg hover:shadow-blue-300 hover:scale-95"
                    type="reset">Refresh</button>
                <a href="{{ route('admin.user-management') }}" title="User Management"
                    class="w-fit flex place-items-center py-1 px-2  ml-3 font-semibold text-zinc-50 bg-yellow-500  rounded hover:shadow-lg hover:shadow-yellow-300 hover:scale-95"
                    type="button">Exit</a>
            </div>
        </form>
    </div>
    {{-- ------------- --}}
@endsection

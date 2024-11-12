@extends('layouts.admin')

@section('content')




    <div class="container ">
        <div class="top-container text-sm font-semibold">
            <a href="{{ route('admin.categories.add') }}" title="Add Category" class="overflow-hidden items-center flex p-2 border-t border-sky-600 w-fit rounded-md shadow-md shadow-sky-600 hover:shadow-none hover:bg-sky-600 hover:text-white ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 mr-1">
                   class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                      </svg>

                <span>Add Category</span>
            </a>
        </div>
    </div>
@endsection

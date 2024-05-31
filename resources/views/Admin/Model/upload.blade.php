@extends('layouts.theme')

@section('content')
    <div class="lg:ml-[250px] mt-10">
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 11-1.414 1.415L10 11.414l-2.936 2.95a1 1 0 01-1.414-1.415l2.95-2.936-2.95-2.936a1 1 0 111.414-1.415L10 8.586l2.936-2.95a1 1 0 011.414 1.415l-2.95 2.936 2.95 2.936z"/></svg>
                </span>
            </div>
        @endif
        <form action="/admin/upload" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Upload Image
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="image" accept="image/*">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Upload
                </button>
            </div>
        </form>
    </div>
@endsection

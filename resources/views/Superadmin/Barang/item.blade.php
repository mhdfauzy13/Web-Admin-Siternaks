@extends('layouts.theme')

@section('content')
    <div class=" lg:ml-[250px] mt-10">
        <div class=" font-bold ">
            <h3>DATA BARANG</h3>
        </div>
        <div class="flex justify-end mb-3">
            <a href={{ route('items.create') }}>
                <button type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    +Tambah
                </button>
            </a>
        </div>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-300 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                        LAB</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                        Nama</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                        Jenis</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                        Tersedia</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                        Dipinjam</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($items as $item)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                            {{ $item->lab }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $item->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $item->type }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $item->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $item->borrowed }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <div class="flex space-x-1">
                                                <a href="{{ route('items.edit', ['item' => $item->id]) }}">
                                                    <div class="rounded-full bg-yellow-500 p-3">
                                                        <img src="../assets/icon/edit.png" alt="">
                                                    </div>
                                                </a>

                                                <form method="post"
                                                    action="{{ route('items.destroy', ['item' => $item->id]) }}"
                                                    onsubmit="return confirmSwal(event)">
                                                    @csrf
                                                    @method('delete')

                                                    <button class="rounded-full bg-red-500 p-3">
                                                        <img src="../assets/icon/delete.png" alt=""
                                                            style="filter: invert(100%)">
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

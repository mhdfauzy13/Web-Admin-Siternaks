@extends('layouts.theme')

@section('content')
    <div class="lg:ml-[250px] mt-10 px-6 py-8 bg-white shadow-md rounded-md">
        <h1 class="text-2xl font-bold mb-4">Hasil Klasifikasi</h1>
        <div class="mb-4">
            <p class="text-gray-700 text-lg"><span class="font-semibold">Terdeteksi:</span> {{ $data['Terdeteksi'] }}</p>
            <p class="text-gray-700 text-lg"><span class="font-semibold">Persentase:</span> {{ $data['Persentase'] }}</p>
        </div>
        <div>
            <h1 class="text-2xl font-bold mb-4">Hasil Esitmasi Berat Hewan</h1>
            <div class="mb-4">
                <p class="text-gray-700 text-lg"><span class="font-semibold">Estimasi Berat:</span>
                    {{ $data['Estimasi Berat'] }}</p>
            </div>
            <a href="/admin/upload"
                class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Upload Gambar Lain
            </a>
        </div>
    @endsection

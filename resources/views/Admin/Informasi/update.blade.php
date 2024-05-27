<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/image/logofix.png" type="image/png">
    <title>Create Form Informasi</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 p-8">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-md shadow-md">

        <h1 class="text-2xl font-bold mb-4">Update Form Informasi</h1>

        <form id="editForm" action="{{ route('informasis.update', ['informasi' => $informasi]) }}" method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <!-- Judul -->
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-600">Judul</label>
                <input type="text" name="judul" id="judul" class="mt-1 p-2 w-full border rounded-md"
                    value="{{ $informasiModel->judul }}">
            </div>

            <!-- Gambar -->
            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-600">Gambar</label>
                <div class="w-[75px]">
                    <img src=" {{ asset('storage/informasis/' . $informasiModel->gambar) }}" alt="">
                </div>
                <input type="file" name="gambar" id="gambar" accept="image/*" value="{{ $informasiModel->gambar }}"
                    class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 p-2 w-full border rounded-md">{{ $informasiModel->deskripsi }}</textarea>

            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-end">
                <button type="submit" onclick="showSuccessAlert()"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                    Simpan
                </button>
            </div>
        </form>
    </div>

</body>

</html>

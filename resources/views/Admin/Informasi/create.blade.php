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

        <h1 class="text-2xl font-bold mb-4">Create Form Informasi</h1>

        <form action={{ route('informasis.store') }} method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Judul -->
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-600">Judul</label>
                <input type="text" name="judul" id="judul" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Gambar -->
            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-600">Gambar</label>
                <input type="file" name="gambar" id="gambar" accept="image/*"
                    class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 p-2 w-full border rounded-md"></textarea>
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-end">
                <button type="submit" onclick="showSuccessAlert()"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                    Simpan
                </button>
            </div>

            <script>
                function showSuccessAlert() {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Data berhasil disimpan",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            </script>
        </form>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/image/logofix.png" type="image/png">
    <title>Create Form</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 p-8">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-md shadow-md">

        <h1 class="text-2xl font-bold mb-4">Create Form</h1>

        <form action={{ route('items.store') }} method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <!-- Lab -->
            <div>
                <label for="lab" class="block text-sm font-medium text-gray-600">Lab</label>
                <input type="text" name="lab" id="lab" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Tipe -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-600">Tipe</label>
                <input type="text" name="type" id="type" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Kuantitas -->
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-600">Kuantitas</label>
                <input type="text" name="quantity" id="quantity" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Dipinjam -->
            <div>
                <label for="borrowed" class="block text-sm font-medium text-gray-600">Dipinjam</label>
                <input type="text" name="borrowed" id="borrowed" class="mt-1 p-2 w-full border rounded-md">
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
                        title: "Data Berhasil Disimpan",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            </script>

        </form>

    </div>

</body>

</html>

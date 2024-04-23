<!-- resources/views/admin/create.blade.php -->

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

        <h1 class="text-2xl font-bold mb-4">Create Admin</h1>

        <form action="{{ route('admins.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div>
                <label for="position" class="block text-sm font-medium text-gray-600">Jabatan</label>
                <input type="text" name="position" id="position" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                    Simpan
                </button>
            </div>

        </form>

        <script>
            function showSuccessAlert() {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Admin Berhasil Dibuat",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        </script>

    </div>

</body>

</html>
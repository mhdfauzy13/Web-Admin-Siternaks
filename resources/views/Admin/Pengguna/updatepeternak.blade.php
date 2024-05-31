<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/image/logofix.png" type="image/png">
    <title>Edit Peternak</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-md shadow-md">
        <h1 class="text-2xl font-bold mb-4">Edit Peternak</h1>
       <form action="{{ route('peternaks.update', ['peternak' => $user->id]) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')


            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md"
                    value="{{ $user->name }}">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md"
                    value="{{ $user->email }}">
            </div>

            <!-- Nama Peternakan -->
            <div>
                <label for="nama_peternakan" class="block text-sm font-medium text-gray-600">Nama Peternakan</label>
                <input type="text" name="nama_peternakan" id="nama_peternakan"
                    class="mt-1 p-2 w-full border rounded-md" value="{{ $user->nama_peternakan }}">
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="mt-1 p-2 w-full border rounded-md"
                    value="{{ $user->alamat }}">
            </div>

            <!-- Password (Kosongkan jika tidak ingin mengubah password) -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password (Biarkan kosong jika
                    tidak ingin mengubah password)</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Konfirmasi
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                    Simpan Perubahan
                </button>
            </div>
        </form>

        <script>
            function showSuccessAlert() {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Perubahan Berhasil Disimpan",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        </script>
    </div>
</body>

</html>

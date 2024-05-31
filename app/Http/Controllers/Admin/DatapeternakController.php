<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DatapeternakController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('Admin.Pengguna.datapeternak', compact('users'));
    }
    public function create(): View
    {
        return view('Admin.Pengguna.createpeternak');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'nama_peternakan' => 'required|string',
            'alamat' => 'required|string',
            'password' => 'required|min:8',
        ]);

        // Buat admin baru
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'peternak',
            'nama_peternakan' => $request->input('nama_peternakan'),
            'alamat' => $request->input('alamat'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('peternaks.index')->with('success', 'Akun berhasil dibuat');
    }

    public function edit(User $user): View
{
    return view('Admin.Pengguna.updatepeternak', compact('user'));
}

public function update(Request $request, User $user)
{
    // Validasi data input
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'nama_peternakan' => 'required|string',
        'alamat' => 'required|string',
        'password' => 'nullable|min:8',
    ]);

    // Update data peternak
    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'nama_peternakan' => $request->input('nama_peternakan'),
        'alamat' => $request->input('alamat'),
    ]);

    // Update password jika diisi
    if ($request->has('password') && $request->password !== null) {
        $user->update(['password' => bcrypt($request->input('password'))]);
    }

    return redirect()->route('peternaks.index')->with('success', 'Perubahan berhasil disimpan');
}

}

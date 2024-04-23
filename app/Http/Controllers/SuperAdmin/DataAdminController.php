<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DataAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->paginate(10);
        $users = User::latest()->paginate(10);
        return view('Superadmin.Pengguna.Dataadmin',compact('admins','users'));
    }
    public function create(): View
    {
        return view('SuperAdmin.Pengguna.createadmin');
    }
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'position' => 'required|string',
            'password' => 'required|min:8',
        ]);

        // Buat admin baru
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 'position' => $request->input('position'),
            'password' => bcrypt($request->input('password')),
            'role' => 'admin',
        ]);

        Admin::create([
            'position' => $request->input('position'),
            'id' => $request->id,
        ]);

        return redirect()
            ->route('admins.index')
            ->with('success', 'Admin berhasil dibuat');
    }
}

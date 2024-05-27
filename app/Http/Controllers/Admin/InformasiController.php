<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index(): View
    {
        $informasis = Informasi::latest()->paginate(5);

        return view('Admin.Informasi.informasi', compact('informasis'));
    }
    public function create(): View
    {
        return view('Admin.Informasi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:5',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required|min:10',
        ]);

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/informasis', $image->hashName());

        //create post
        Informasi::create([
            'judul' => $request->judul,
            'gambar' => $image->hashName(),
            'deskripsi' => $request->deskripsi,
        ]);

        //redirect to index
        return redirect()
            ->route('informasis.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($informasi)
    {
        $informasiModel = Informasi::find($informasi);

        if (!$informasiModel) {
            return redirect()
                ->route('informasis.index')
                ->with(['error' => 'Data tidak ditemukan!']);
        }
        return view('Admin.Informasi.update', compact('informasiModel', 'informasi'));
    }

    public function update(Request $request, $informasi)
    {
        $informasiModel = Informasi::find($informasi);

        if (!$informasiModel) {
            return redirect()
                ->route('informasis.index')
                ->with(['error' => 'Data tidak ditemukan!']);
        }

        // Validate form
        $this->validate($request, [
            'judul' => 'required|min:5',
            // 'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required|min:10',
        ]);

        // Update fields
        $informasiModel->judul = $request->judul;
        $informasiModel->deskripsi = $request->deskripsi;

        // Check if a new image is uploaded
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($informasiModel->gambar) {
                Storage::delete('public/informasis/' . $informasiModel->gambar);
            }

            // Upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/informasis', $image->hashName());
            $informasiModel->gambar = $image->hashName();
        }

        // Save changes
        $informasiModel->save();

        return redirect()
            ->route('informasis.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($informasi)
    {
        $informasiModel = Informasi::find($informasi);

        if (!$informasiModel) {
            return redirect()
                ->route('informasis.index')
                ->with(['error' => 'Data tidak ditemukan!']);
        }
        // Hapus gambar jika ada
        if ($informasiModel->gambar) {
            Storage::delete('public/informasis/' . $informasiModel->gambar);
        }

        $informasiModel->delete();

        return redirect()
            ->route('informasis.index')
            ->with(['success' => 'Data berhasil dihapus!']);
    }
}

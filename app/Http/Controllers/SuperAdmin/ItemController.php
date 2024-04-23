<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::latest()->paginate(10);
        return view('Superadmin.Barang.item', compact('items'));
    }
    public function create(): View
    {
        return view('SuperAdmin.Barang.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'lab' => 'required|min:5',
            'name' => 'required|min:5',
            'type' => 'required|min:5',
            'quantity' => 'required|max:3',
            'borrowed' => 'required|max:3',
        ]);
        //create post
        Item::create([ 
            'lab' => $request->lab,
            'name' => $request->name,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'borrowed' => $request->borrowed,
        ]);
        //redirect to index
        return redirect()
            ->route('items.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit($item)
    {
        $itemModel = Item::find($item);

        if (!$itemModel) {
            return redirect()
                ->route('items.index')
                ->with(['error' => 'Data tidak ditemukan!']);
        }
        return view('SuperAdmin.Barang.update', compact('itemModel', 'item'));
    }
    public function update(Request $request, $item)
    {
        $itemModel = Item::find($item);

        if (!$itemModel) {
            return redirect()
                ->route('items.index')
                ->with(['error' => 'Data tidak ditemukan!']);
        }

        //validate form
        $this->validate($request, [
            'lab' => 'required|min:5',
            'name' => 'required|min:5',
            'type' => 'required|min:5',
            'quantity' => 'required|max:3',
            'borrowed' => 'required|max:3',
        ]);

        $itemModel->lab = $request->lab;
        $itemModel->name = $request->name;
        $itemModel->type = $request->type;
        $itemModel->quantity = $request->quantity;
        $itemModel->borrowed = $request->borrowed;
        $itemModel->update();

        return redirect()
            ->route('items.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    
    public function destroy($item)
    {
        $itemModel = Item::find($item);

        if (!$itemModel) {
            return redirect()
                ->route('items.index')
                ->with(['error' => 'Data tidak ditemukan!']);
        }

        $itemModel->delete();

        return redirect()
            ->route('items.index')
            ->with(['success' => 'Data berhasil dihapus!']);
    }    
}

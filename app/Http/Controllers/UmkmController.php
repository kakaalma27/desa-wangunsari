<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use Illuminate\Http\Request;

class umkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Listumkm = umkm::all();
        return view('admin.crud.crud_umkm.index', compact('Listumkm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crud.crud_umkm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'nohp' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Jika Anda ingin memvalidasi gambar
        ]);

        // Jika Anda ingin menyimpan gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        umkm::create($data);
        return redirect()->route('umkm.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $umkm = umkm::findOrFail($id);
        return view('admin.crud.crud_umkm.edit', compact('umkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'nohp' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Jika Anda ingin memvalidasi gambar
        ]);

        // Jika Anda ingin menyimpan gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
        $umkm = umkm::findOrFail($id);
        $umkm->update($data);
        return redirect()->route('umkm.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $umkm = umkm::find($id);
        $umkm->delete();
        return redirect()->route('umkm.index')->with('success', 'Data berhasil dihapus.');
    }
}

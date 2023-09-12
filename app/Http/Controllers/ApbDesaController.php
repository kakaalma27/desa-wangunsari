<?php

namespace App\Http\Controllers;

use App\Models\Apb_desa;
use Illuminate\Http\Request;

class ApbDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $APBDESA = Apb_desa::all();
        return view('admin.crud.crud_apbdesa.index', compact('APBDESA'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crud.crud_apbdesa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        // Jika Anda ingin menyimpan gambar

        Apb_desa::create($data);
        return redirect()->route('admin.home')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Apb_desa $apb_desa)
    {
        // return view('admin.')
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $apb_desa = Apb_desa::findOrFail($id);
        return view('admin.crud.crud_apbdesa.edit', compact('apb_desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kategori' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $apb_desa = Apb_desa::findOrFail($id);
        $apb_desa->update($data);
    
        return redirect()->route('apbdesa.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apb_desa $apb_desa)
    {
        $apb_desa->delete();
        return redirect()->route('apbdesa.index')->with('success', 'Data berhasil dihapus.');
    }
}

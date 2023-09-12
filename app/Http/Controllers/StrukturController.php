<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ListStuktur = Struktur::all();
        return view('admin.crud_struktur.index', compact('ListStuktur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crud_struktur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        Struktur::create($data);
        return redirect()->route('struktur.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Struktur $struktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $struktur = Struktur::findOrFail($id);
        return view('admin.crud_struktur.edit', compact('struktur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $struktur = Struktur::findOrFail($id);
        $struktur->update($data);
        return redirect()->route('struktur.index')->with('success', 'Data berhasil diubah.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $struktur = Struktur::find($id);
        $struktur->delete();
        return redirect()->route('struktur.index')->with('success', 'Data berhasil dihapus.');
    }
}

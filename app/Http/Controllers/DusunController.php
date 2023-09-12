<?php

namespace App\Http\Controllers;

use App\Models\dusun;
use Illuminate\Http\Request;


class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dusun = dusun::all();
        return view('editor.crud.crud_dusun.index', compact('dusun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('editor.crud.crud_dusun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'dusun' => 'required',
            'rt' => 'required',
            'deskripsi' => 'required',
        ]);

        // Jika Anda ingin menyimpan gambar

        dusun::create($data);
        return redirect()->route('dusun.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(dusun $dusun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dusun = dusun::findOrFail($id);
        return view('editor.crud.crud_dusun.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'dusun' => 'required',
            'rt' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $dusun = dusun::findOrFail($id);
        $dusun->update($data);
    
        return redirect()->route('dusun.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dusun $dusun)
    {
        $dusun = Desa::find($id);
        $dusun->delete();
        return redirect()->route('editor.index')->with('success', 'Data berhasil dihapus.');
    }
}

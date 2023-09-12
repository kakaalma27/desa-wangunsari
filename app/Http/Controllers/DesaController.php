<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $DesaList = Desa::all();
        return view('admin.crud.crud_desa.index', compact('DesaList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crud.crud_desa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nipd' => 'required',
            'jabatan' => 'required',
            'tupoksi' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Jika Anda ingin memvalidasi gambar
        ]);

        // Jika Anda ingin menyimpan gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        Desa::create($data);
        return redirect()->route('admin.home')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Desa $desa)
    {
        return view('Desa.show', compact('desa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desa $desa, $id)
    {
        $desa = Desa::find($id);
        return view('admin.crud.crud_desa.edit', compact('desa'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $data = $request->validate([
        'nama' => 'required',
        'nipd' => 'required',
        'jabatan' => 'required',
        'tupoksi' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $data['image'] = $imagePath;
    }

    $perangkatdesa = Desa::find($id);
    $perangkatdesa->update($data);

    return redirect()->route('admin.home')->with('success', 'Data berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $desa = Desa::find($id);
        $desa->delete();
        return redirect()->route('admin.home')->with('success', 'Data berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use App\Models\AnggotaStruktur;

class AnggotaStrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ListStruktur = Struktur::all();
        $selectedStrukturId = $request->input('strukturs_id');
        
        // Query data investaris desa berdasarkan pilihan Struktur Desa
        $ListAnggota = AnggotaStruktur::where('strukturs_id', $selectedStrukturId)->get();
        
        return view('admin.crud_struktur.crud_anggota.index', compact('ListStruktur', 'ListAnggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ListStuktur = Struktur::all();
        return view('admin.crud_struktur.crud_anggota.create', compact('ListStuktur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'strukturs_id' => 'required|exists:strukturs,id',
            'nama' => 'required',
            'nip' => 'nullable',
            'jataban' => 'nullable',
            'tupoksi' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
    
        AnggotaStruktur::create($data);
        return redirect()->route('anggota.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnggotaStruktur $anggotaStruktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ListAnggota = AnggotaStruktur::findOrFail($id);
        return view('admin.crud_struktur.crud_anggota.edit', compact('ListAnggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'strukturs_id' => 'required|exists:strukturs,id',
            'nama' => 'required',
            'nip' => 'nullable',
            'jataban' => 'nullable',
            'tupoksi' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
    
        $ListAnggota = AnggotaStruktur::findOrFail($id);
        $ListAnggota->update($data);
        return redirect()->route('anggota.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ListAnggota = AnggotaStruktur::find($id);
        $ListAnggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Data berhasil dihapus.');
    }
}

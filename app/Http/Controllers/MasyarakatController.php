<?php

namespace App\Http\Controllers;

use App\Models\dusun;
use App\Models\masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ListDusun = dusun::all();
        $selectedMasyarakatId = $request->input('dusun_id');
        
        // Query data investaris desa berdasarkan pilihan APB Desa
        $ListMasyarakat = masyarakat::where('dusun_id', $selectedMasyarakatId)->get();

        
        return view('editor.crud.crud_dusun.crud_masyarakat.index', compact('ListMasyarakat', 'ListDusun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ListDusun = dusun::all();
        return view('editor.crud.crud_dusun.crud_masyarakat.create', compact('ListDusun'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'dusun_id' => 'required|exists:dusuns,id', // Validate that dusun_id exists in dusuns table
            'nama' => 'required',
            'jenis_kelamin' => 'required', // Correct the field name to 'status'
            'staus' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
        ]);
    
        Masyarakat::create($data); // Use the correct model name 'Masyarakat'
    
        return redirect()->route('masyarakat.index')->with('success', 'Data berhasil diperbarui.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(masyarakat $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $masyarakat = Masyarakat::findOrFail($id);
        return view('editor.crud.crud_dusun.crud_masyarakat.edit', compact('masyarakat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'dusun_id' => 'required|exists:dusuns,id', // Validate that dusun_id exists in dusuns table
            'nama' => 'required',
            'jenis_kelamin' => 'required', // Correct the field name to 'status'
            'staus' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
        ]);

        $masyarakat = dusun::findOrFail($id);
        $masyarakat->update($data);
        return redirect()->route('masyarakat.index')->with('success', 'Data berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(masyarakat $masyarakat)
    {
        //
    }
}

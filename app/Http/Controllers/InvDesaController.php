<?php

namespace App\Http\Controllers;
use App\Models\Apb_desa;
use App\Models\Inv_desa;
use Illuminate\Http\Request;

class InvDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $APBDESA = Apb_desa::all();
        $selectedApbId = $request->input('apb_id');
        
        // Query data investaris desa berdasarkan pilihan APB Desa
        $INVList = Inv_desa::where('apb_id', $selectedApbId)->get();
        
        return view('admin.crud.crud_invdesa.index', compact('APBDESA', 'INVList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $APBDESA = Apb_desa::all();
        return view('admin.crud.crud_invdesa.create', compact('APBDESA'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'apb_id' => 'required|exists:apb_desas,id', // Validate that apb_id exists in apb_desas table
            'nama' => 'required',
            'kode' => 'required',
            'nup' => 'required',
            'merek' => 'required',
            'tahun' => 'required', // Jika Anda ingin memvalidasi gambar
        ]);

        Inv_desa::create($data);
        return redirect()->route('admin.home')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inv_desa $inv_desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inv_desa = Inv_desa::findOrFail($id);
        return view('admin.crud.crud_invdesa.edit', compact('inv_desa'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'nup' => 'required',
            'merek' => 'required',
            'tahun' => 'required',
        ]);
    
        $inv_desa = Inv_desa::findOrFail($id);
        $inv_desa->update($data);
    
        return redirect()->route('admin.home')->with('success', 'Data berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inv_desa $inv_desa)
    {
        $inv_desa->delete();
        return redirect()->route('admin.home')->with('success', 'Data berhasil dihapus.');
    }
    
}

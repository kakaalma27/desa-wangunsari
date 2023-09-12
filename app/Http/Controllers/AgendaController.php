<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AgendaList = agenda::all();
        return view('admin.crud.crud_agenda.index', compact('AgendaList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crud.crud_agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'waktu' => 'required',
        ]);

        agenda::create($data);
        return redirect()->route('admin.home')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agenda = agenda::findOrFail($id);
        return view('admin.crud.crud_agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, agenda $agenda)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'waktu' => 'required',
        ]);

        $agenda->update($data); // Use $berita instead of $Berita
        return redirect()->route('admin.home')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(agenda $agenda)
    {
        $agenda = agenda::find($id);
        $agenda->delete();
        return redirect()->route('admin.home')->with('success', 'Data berhasil dihapus.');
    }
}

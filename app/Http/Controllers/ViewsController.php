<?php

namespace App\Http\Controllers;
use App\Models\Desa;
use App\Models\Umkm;
use App\Models\dusun;
use App\Models\agenda;
use App\Models\Berita;
use App\Models\rt_dusun;
use App\Models\Struktur;
use App\Models\masyarakat;
use Illuminate\Http\Request;
use App\Models\AnggotaStruktur;

class ViewsController extends Controller
{
    public function index()
    {
        $BeritaList = Berita::all();
        $AgendaList = Agenda::all();
    
        $data = [
            'BeritaList' => $BeritaList,
            'AgendaList' => $AgendaList,
        ];
    
        return view('home', $data);
    }
    

    public function visi()
    {
        return view('main.visi');
    }

    public function desa(Request $request)
    {
        $ListStruktur = Struktur::all();
        $ListAnggota = collect(); // Inisialisasi koleksi kosong
        
        foreach ($ListStruktur as $struktur) {
            $anggota = AnggotaStruktur::where('strukturs_id', $struktur->id)->get();
            
            // Memeriksa apakah strukturs_id adalah 1 sebelum menggabungkan
            if ($struktur->id === 1) {
                $ListAnggota = $ListAnggota->concat($anggota);
            }
        }
        
        return view('main.perangkatdesa', compact('ListAnggota'));
    }


    public function deberita($id)
    {
        $berita = Berita::find($id);
        return view('main.berita', compact('berita'));
    }

    public function person()
    {
        return view('main.person');
    }
    
    public function taruna()
    {
        $ListStruktur = Struktur::all();
        $ListAnggota = collect(); // Inisialisasi koleksi kosong
        
        foreach ($ListStruktur as $struktur) {
            $anggota = AnggotaStruktur::where('strukturs_id', $struktur->id)->get();
            
            // Memeriksa apakah strukturs_id adalah 1 sebelum menggabungkan
            if ($struktur->id === 2) {
                $ListAnggota = $ListAnggota->concat($anggota);
            }
        }
        return view('main.karangtaruna', compact('ListAnggota'));
    }

    public function posyandu()
    {
        return view('main.posyandu');
    }

    public function potensi(Request $request)
    {
        $Umkmlist = Umkm::all();
        $Laki_laki = masyarakat::where('jenis_kelamin', 'Laki-Laki')->count();
        $Perempuan = masyarakat::where('jenis_kelamin', 'Perempuan')->count();
        $JumlahTotal = $Laki_laki + $Perempuan;
        $query = $request->input('query');

        $results = masyarakat::where('nama', 'LIKE', '%' . $query . '%')
                        ->get();

        $data = [
            'TotalPenduduk' => $JumlahTotal,
            'JumlahLakiLaki' => $Laki_laki,
            'JumlahPerempuan' => $Perempuan,
            'results' => $results,
        ];
        return view('main.potensi', $data, compact('Umkmlist'));
    }
    
    public function apbdesa()
    {
        return view('main.apbdesa');
    }

}

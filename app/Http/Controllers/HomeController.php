<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Umkm;
use App\Models\dusun;
use App\Models\agenda;
use App\Models\Berita;
use App\Models\masyarakat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome()
    {
        return view('home',["msg"=>"Hello! I am user"]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editorHome(Request $request)
    {
        $Dusun = dusun::count();
        $Rt_dusun = masyarakat::count();
        $jumlahLakiLaki  = masyarakat::where('jenis_kelamin', 'Laki-Laki')->count();
        $jumlahPerempuan  = masyarakat::where('jenis_kelamin', 'Perempuan')->count();
        $jumlahTotal = $Dusun + $Rt_dusun;
        $query = $request->input('query');
        $results = masyarakat::where('nama', 'LIKE', '%' . $query . '%')
                        ->get();


        return view('editor.home',compact('Dusun','Rt_dusun', 'jumlahLakiLaki', 'jumlahPerempuan', 'jumlahTotal','results'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $data = [
            'BeritaCount' => Berita::count(),
            'AgendaCount' => Agenda::count(),
            'UmkmCount' => Umkm::count(),
            'BeritaList' => Berita::all(),
            'AgendaList' => Agenda::all(),
            'UmkmList' => Umkm::all(),
        ];
        return view('admin.home', $data);
    }
}
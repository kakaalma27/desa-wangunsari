<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ApbDesaController;
use App\Http\Controllers\InvDesaController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\AnggotaStrukturController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/",[ViewsController::class, 'index'])->name('page');
Route::get("/visi",[ViewsController::class, 'visi']);
Route::get("/desa",[ViewsController::class, 'desa']);
Route::get("/berita/{id}",[ViewsController::class, 'deberita']);
Route::get("/person",[ViewsController::class, 'person']);
Route::get("/taruna",[ViewsController::class, 'taruna']);
Route::get("/posyandu",[ViewsController::class, 'posyandu']);
Route::get("/potensi",[ViewsController::class, 'potensi']);
Route::get("/apbdesa",[ViewsController::class, 'apbdesa']);


Auth::routes();
// Route User
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/home",[HomeController::class, 'userHome'])->name("home");
});
// Route Editor
Route::middleware(['auth','user-role:editor'])->group(function()
{
    Route::get("/editor/home",[HomeController::class, 'editorHome'])->name("editor.home");
    Route::resource('/editor/dusun', DusunController::class);
    Route::resource('/editor/masyarakat', MasyarakatController::class);
});
// Route Admin
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[HomeController::class, 'adminHome'])->name("admin.home");
    Route::resource('/admin/beritadesa', BeritaController::class);
    Route::resource('/admin/agenda', AgendaController::class);
    Route::resource('/admin/apbdesa', ApbDesaController::class);
    Route::resource('/admin/invdesa', InvDesaController::class);
    Route::resource('/admin/umkm', UmkmController::class);
    Route::resource('/admin/struktur', StrukturController::class);
    Route::resource('/admin/anggota', AnggotaStrukturController::class);
});
<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Role;
use App\User;
use Carbon\Carbon;
use Auth;

class AduanController extends Controller
{
    // aduan
    public function index()
    {
        $user = Auth::user();

        return view('masyarakat.aduan.index', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_aduan' => 'required',
            'isi_aduan' => 'required',
        ]);

        Pengaduan::create([
            'user_id' => Auth::id(),
            'tanggal_aduan' => Carbon::now(),
            'judul_aduan' => $request->judul_aduan,
            'isi_aduan' => $request->isi_aduan,
            'status' => 'proses',
        ]);

        return redirect()->route('masyarakat.aduan.index');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $pengaduan = Pengaduan::find($id);
        return view('masyarakat.aduan.edit_aduan', [
            'pengaduan' => $pengaduan,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_aduan' => 'required',
            'isi_aduan' => 'required',
        ]);

        Pengaduan::find($id)->update([
            'user_id' => Auth::id(),
            'tanggal_aduan' => Carbon::now(),
            'judul_aduan' => $request->judul_aduan,
            'isi_aduan' => $request->isi_aduan,
            'status' => 'proses',
        ]);

        return redirect()->route('masyarakat.aduan.index_saya');
    }
}

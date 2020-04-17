<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Tanggapan;
use App\Role;
use App\User;
use Carbon\Carbon;
use Auth;
use DB;

class AduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all();
        $user = Auth::user();

        return view('petugas.aduan.index', [
            'pengaduan' => $pengaduan,
            'user' => $user
        ]);
    }

    public function detail($id)
    {
        $pengaduan = Pengaduan::find($id);
        $user = Auth::user();
        $tanggapan = DB::table('tanggapans')
        ->join('users', 'users.id', '=', 'tanggapans.user_id')
        ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
        ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
        ->where('pengaduan_id', $id)
        ->get();

        return view('petugas.aduan.detail', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan,
            'user' => $user
        ]);
    }

    public function store(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'isi_tanggapan' => 'required',
            'pengaduan_id' => 'required',
        ]);

        
        // Simpan data
        Tanggapan::create([
            'user_id' => Auth::id(),
            'tanggal_tanggapan' => Carbon::now(),
            'isi_tanggapan' => $request->isi_tanggapan,
            'pengaduan_id' => $request->pengaduan_id,
        ]);

        $update = $pengaduan->find($request->pengaduan_id)->update([
            'status' => 'selesai'
        ]);

        return redirect()->route('petugas.aduan.index');
    }
}

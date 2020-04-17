<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Tanggapan;
use App\Role;
use App\User;
use Carbon\Carbon;
use Auth;
use DB;
use PDF;

class AduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all();
        $user = Auth::user();

        return view('admin.aduan.index', [
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

        return view('admin.aduan.detail', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan,
            'user' => $user
        ]);
    }

    public function cetak_laporan(Request $request)
    {
        $this->validate($request,[
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);

        $pengaduan = Pengaduan::all();
        $judul = "Cetak PDF data aduan tanggal : $request->tanggal_awal - $request->tanggal_akhir";
        $pdf = PDF::loadView('admin.aduan.pdf', [
            'pengaduan' => $pengaduan,
            'judul' => $judul
        ]);

        return $pdf->stream("[$request->tanggal_awal - $request->tanggal_akhir]-ketikan.pdf");
    }
}

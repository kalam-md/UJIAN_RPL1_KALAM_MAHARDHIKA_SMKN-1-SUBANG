<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Tanggapan;
use App\Role;
use App\User;
use Carbon\Carbon;
use Auth;
use DB;

class BerandaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jumlah_aduan = Pengaduan::where('user_id', Auth::id())->get()->count();

        return view('masyarakat.beranda.index', [
            'user' => $user,
            'jumlah_aduan' => $jumlah_aduan
        ]);
    }

    // aduan saya
    public function index_aduan_saya()
    {
        $user = Auth::user();
        $pengaduan = Pengaduan::where('user_id', Auth::id())->get();

        return view('masyarakat.aduan.index_saya', [
            'pengaduan' => $pengaduan,
            'user' => $user
        ]);
    }

    public function detail_saya($id)
    {
        $user = Auth::user();
        $pengaduan = Pengaduan::find($id);
        $tanggapan = DB::table('tanggapans')
        ->join('users', 'users.id', '=', 'tanggapans.user_id')
        ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
        ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
        ->where('pengaduan_id', $id)
        ->get();

        return view('masyarakat.aduan.detail.detail_saya', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan,
            'user' => $user
        ]);
    }

    // semua aduan
    public function index_aduan_semua()
    {
        $user = Auth::user();
        $pengaduan = Pengaduan::all();

        return view('masyarakat.aduan.index_semua', [
            'pengaduan' => $pengaduan,
            'user' => $user
        ]);
    }

    public function detail_semua($id)
    {
        $user = Auth::user();
        $pengaduan = Pengaduan::find($id);
        $tanggapan = DB::table('tanggapans')
        ->join('users', 'users.id', '=', 'tanggapans.user_id')
        ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
        ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
        ->where('pengaduan_id', $id)
        ->get();

        return view('masyarakat.aduan.detail.detail_semua', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan,
            'user' => $user
        ]);
    }

    public function search(Request $request)
    {
        // search data
        $this->validate($request,[
            'tanggal' => 'required|date'
        ]);

        $tanggal = Carbon::parse($request->start_date);
        $search = Pengaduan::whereDate('tanggal_aduan','=',$tanggal->format('m-d-y'));

        return view('masyarakat.aduan.index_semua', [
            'search' => $search
        ]);
    }
}

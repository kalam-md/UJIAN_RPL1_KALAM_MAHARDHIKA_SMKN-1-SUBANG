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

class BerandaController extends Controller
{
    public function index()
    {
        // $users = Role::find(2)->users;
        
        // dd($users);
        $user = Auth::user();
        $jumlah_aduan = Pengaduan::all()->count();
        $jumlah_tanggapan = Tanggapan::all()->count();
        $jumlah_petugas = Role::find(2)->users->count();
        $jumlah_masyarakat = Role::find(3)->users->count();

        return view('admin.beranda.index', [
            'user' => $user,
            // 'users' => $users,
            'jumlah_aduan' => $jumlah_aduan,
            'jumlah_tanggapan' => $jumlah_tanggapan,
            'jumlah_petugas' => $jumlah_petugas,
            'jumlah_masyarakat' => $jumlah_masyarakat
        ]);
    }
}

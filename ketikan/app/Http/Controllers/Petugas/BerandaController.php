<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Role;
use App\User;
use Carbon\Carbon;
use Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        

        return view('petugas.beranda.index', ['user' => $user]);
    }
}

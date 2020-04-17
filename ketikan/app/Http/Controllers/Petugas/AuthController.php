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

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit_profil(User $user)
    {
        $user = Auth::user();

        return view('petugas.auth.edit', ['user' => $user]);
    }

    public function update(User $user)
    { 
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        return redirect()->route('petugas.beranda.index');
    }
}

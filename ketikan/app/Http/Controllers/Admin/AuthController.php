<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

    public function index()
    {
        $users = User::all();

        return view('admin.auth.index',[
            'users' => $users
        ]);
    }

    public function edit_profil(User $user)
    {
        $user = Auth::user();

        return view('admin.auth.edit', ['user' => $user]);
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

        return redirect()->route('admin.beranda.index');
    }

    // register petugas baru
    public function register_petugas(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::select('id')->where('name', 'petugas')->first();
        $user->roles()->attach($role);

        return redirect()->route('admin.auth.index');
    }
}

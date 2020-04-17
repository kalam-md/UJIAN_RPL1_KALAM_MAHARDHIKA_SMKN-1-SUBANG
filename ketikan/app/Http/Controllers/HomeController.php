<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()) {
            if(Auth::user()->hasAnyRole('admin')) {
                return redirect()->route('admin.beranda.index');
            }

            elseif(Auth::user()->hasAnyRole('masyarakat')) {
                return redirect()->route('masyarakat.beranda.index');
            }

            elseif(Auth::user()->hasAnyRole('petugas')) {
                return redirect()->route('petugas.beranda.index');
            }

            return false;
        }
    }

    // public function landing()
    // {
    //     $user = Auth::user();

    //     return view('welcome', ['user' => $user]);
    // }
}

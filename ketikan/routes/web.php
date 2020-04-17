<?php

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

Route::get('/', function () {
    $user = Auth::user();
    return view('welcome', ['user' => $user]);
});

Auth::routes();

// Route::get('/', 'HomeController@landing')->name('landing');
Route::get('/home', 'HomeController@index')->name('home');

// Admin
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function() {
    Route::get('/beranda', 'BerandaController@index')->name('beranda.index');
    // aduan
    Route::get('/aduan', 'AduanController@index')->name('aduan.index');
    Route::get('/aduan/detail/{id}', 'AduanController@detail')->name('aduan.detail');
    // auth
    Route::get('/data/user', 'AuthController@index')->name('auth.index');
    // edit profil
    Route::get('/edit/profil/{user}', 'AuthController@edit_profil')->name('edit.profil');
    Route::patch('/edit/profil/{user}/update', 'AuthController@update')->name('update.profil');
    // register petugas
    Route::post('/register/petugas', 'AuthController@register_petugas')->name('register.petugas');
    // cetak aduan
    Route::post('/cetak/aduan', 'AduanController@cetak_laporan')->name('cetak.aduan');
});

// Petugas
Route::namespace('Petugas')->prefix('petugas')->middleware(['auth', 'petugas'])->name('petugas.')->group(function() {
    Route::get('/beranda', 'BerandaController@index')->name('beranda.index');
    // aduan
    Route::get('/aduan', 'AduanController@index')->name('aduan.index');
    Route::get('/aduan/detail/{id}', 'AduanController@detail')->name('aduan.detail');
    // balasan
    Route::post('/balasan/store', 'AduanController@store')->name('balasan.store');
    // edit profil
    Route::get('/edit/profil/{user}', 'AuthController@edit_profil')->name('edit.profil');
    Route::patch('/edit/profil/{user}/update', 'AuthController@update')->name('update.profil');

});

// Masyarakat
Route::namespace('Masyarakat')->prefix('masyarakat')->middleware(['auth', 'masyarakat'])->name('masyarakat.')->group(function() {
    Route::resource('/beranda', 'BerandaController');
    // aduan
    Route::get('/tulis/aduan', 'AduanController@index')->name('aduan.index');
    Route::post('/tulis/aduan/store', 'AduanController@store')->name('aduan.store');
    // aduan saya
    Route::get('/aduan/saya', 'BerandaController@index_aduan_saya')->name('aduan.index_saya');
    Route::get('/aduan/saya/detail/{id}', 'BerandaController@detail_saya')->name('aduan.detail_saya');
    // aduan semua
    Route::get('/aduan/semua', 'BerandaController@index_aduan_semua')->name('aduan.index_semua');
    Route::get('/aduan/semua/detail/{id}', 'BerandaController@detail_semua')->name('aduan.detail_semua');
    // edit profil
    Route::get('/edit/profil/{user}', 'AuthController@edit_profil')->name('edit.profil');
    Route::patch('/edit/profil/{user}/update', 'AuthController@update')->name('update.profil');
    // search
    Route::post('/cari', 'BerandaController@search')->name('aduan.cari');
    // edit aduan
    Route::get('/edit/aduan/{id}', 'AduanController@edit')->name('aduan.edit');
    Route::patch('/edit/aduan/{id}/update', 'AduanController@update')->name('aduan.update');

});
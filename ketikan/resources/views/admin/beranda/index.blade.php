@extends('layouts.app')
@section('title', 'KETIKAN')
@section('content')
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile">
            <div class="avatar">
              <img src="/assets/img/faces/logo.png" alt="Circle Image" class="img-raised rounded-circle img-fluid">
            </div>
            <div class="name">
              <h3 class="title">{{ Auth::user()->name }}</h3>
              <h6>Administrator</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="description text-center">
        <p>Selamat data Administrator silahkan anda bisa mengubah profil, melihat data user, melihat data aduan dan memproses sebuah laporan. </p>
      </div>
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile-tabs">
            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                  <i class="material-icons">all_inbox</i> Total Aduan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                  <i class="material-icons">chat</i> Aduan Diverifikasi
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                  <i class="material-icons">people</i> Total User
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="tab-content tab-space">
        <div class="tab-pane active text-center gallery" id="studio">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <p>Total aduannya berjumlah : {{ $jumlah_aduan }} aduan.</p>
            </div>
          </div>
        </div>
        <div class="tab-pane text-center gallery" id="works">
          <div class="row">
          <div class="col-md-3"></div>
            <div class="col-md-6">
              <p>Total aduan yang ditanggapi berjumlah : {{ $jumlah_tanggapan }} tanggapan.</p>
            </div>
          </div>
        </div>
        <div class="tab-pane text-center gallery" id="favorite">
          <div class="row">
          <div class="col-md-3"></div>
            <div class="col-md-6">
              <p>Total user berjumlah :</p>
              <p>Jumlah Petugas : {{ $jumlah_petugas }} Petugas.</p>
              <p>Jumlah Masyarakat : {{ $jumlah_masyarakat }} Masyarakat.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
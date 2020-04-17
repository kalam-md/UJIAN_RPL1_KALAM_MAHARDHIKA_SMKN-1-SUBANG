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
              <h6>Masyarakat</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="description text-center">
        <p>Selamat datang masyarakat silahkan anda bisa menulis aduan, merubah aduan dan mengubah profil anda sendiri. </p>
      </div>
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile-tabs">
            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                  <i class="material-icons">chat</i> Aduan
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
              <p>Total aduan saya berjumlah : {{ $jumlah_aduan }} aduan.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
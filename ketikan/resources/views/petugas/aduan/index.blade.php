@extends('layouts.app')
@section('title', 'KETIKAN')
@section('content')
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile-tabs">
            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                  <i class="material-icons">notes</i> Data Aduan
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="tab-content tab-space">
        <div class="tab-pane active gallery" id="studio">
          <div class="row">
          <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pengadu</th>
                            <th scope="col">Judul Aduan</th>
                            <th scope="col">Tanggal Aduan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pengaduan as $aduan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $aduan->users->name }}</td>
                            <td>{{ $aduan->judul_aduan }}</td>
                            <td>{{ $aduan->tanggal_aduan }}</td>
                            <td>
                                <a href="{{ route('petugas.aduan.detail', $aduan->id) }}" class="btn btn-primary btn-sm">Lihat Lebih Lengkap</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
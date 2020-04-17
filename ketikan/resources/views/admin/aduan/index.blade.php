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
            <button type="button" class="btn btn-primary btn-sm float-left mb-3" data-toggle="modal" data-target="#exampleModal">Cetak Aduan</button>
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
                                <a href="{{ route('admin.aduan.detail', $aduan->id) }}" class="btn btn-primary btn-sm">Lihat Lebih Lengkap</a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.cetak.aduan') }}" method="post" target="_blank">
        @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Awal</label>
                <input type="date" class="form-control" name="tanggal_awal">
                <small id="emailHelp" class="form-text text-muted">Masukan tanggal awal anda ingin mencetak laporan PDF!</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tanggal_akhir">
                <small id="emailHelp" class="form-text text-muted">Masukan tanggal akhir anda ingin mencetak laporan PDF!</small>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Cetak</button>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection
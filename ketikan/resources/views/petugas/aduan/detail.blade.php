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
                  <i class="material-icons">visibility</i> Aduan Lengkap
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
                <button type="button" class="btn btn-primary btn-sm float-left mb-3" data-toggle="modal" data-target="#exampleModal">Balas Aduan</button>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $pengaduan->judul_aduan }}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Dikirim oleh: {{ $pengaduan->users->name }}</h6>
                        <p class="card-text">
                        {{ $pengaduan->isi_aduan }}
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        {{ $pengaduan->tanggal_aduan }}
                    </div>
                </div>
                @if($tanggapan == TRUE)
                <nav aria-label="breadcrumb" role="navigation">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Balasan Petugas...</li>
                  </ol>
                </nav>
                @foreach($tanggapan as $tanggap)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $tanggap->name }}</h4>
                        <p class="card-text">
                        {{ $tanggap->isi_tanggapan }}
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        {{ $tanggap->tanggal_tanggapan }}
                    </div>
                </div>
                @endforeach
                @endif
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
        <h5 class="modal-title" id="exampleModalLabel">Balasan Aduan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('petugas.balasan.store') }}" method="post">
        @csrf
            <input type="hidden" name="pengaduan_id" value="{{$pengaduan->id}}">
            <div class="form-group">
                <label for="exampleInputPassword1">Tulis Balasan</label>
                <textarea name="isi_tanggapan" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Balas</button>
          </div>
        </form>
    </div>
  </div>
</div>

@endsection
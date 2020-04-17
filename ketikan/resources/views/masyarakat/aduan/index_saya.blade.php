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
                  <i class="material-icons">person</i> Aduan Saya
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
            @foreach($pengaduan as $aduan)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $aduan->judul_aduan }}</h4>
                        <p class="card-text">
                        {{ str_limit($aduan->isi_aduan, 300, ' ....') }}
                        </p>
                        <a href="{{ route('masyarakat.aduan.detail_saya', $aduan->id) }}" class="btn btn-primary">Lihat Lebih Lengkap</a>
                        @if($aduan->status != 'selesai')
                        <a href="{{ route('masyarakat.aduan.edit', $aduan->id) }}" class="btn btn-info">Ubah Aduan</a>
                        @endif
                    </div>
                </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
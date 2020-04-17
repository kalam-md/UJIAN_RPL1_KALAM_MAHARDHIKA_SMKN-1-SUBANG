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
                  <i class="material-icons">create</i> Ubah Profil
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="tab-content tab-space">
        <div class="tab-pane active gallery" id="studio">
          <div class="row">
          <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ route('admin.update.profil', $user) }}" method="post">
                @csrf
                {{ method_field('patch') }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $user->email }}">
                        <small id="emailHelp" class="form-text text-muted">Email tidak boleh sama dengan email sebelumnya!</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
                        <small id="emailHelp" class="form-text text-muted">Password harus lebih dari 6 karakter</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
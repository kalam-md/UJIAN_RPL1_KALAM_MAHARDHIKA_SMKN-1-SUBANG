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
                  <i class="material-icons">group</i> Data User
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
            <button type="button" class="btn btn-primary btn-sm float-left mb-3" data-toggle="modal" data-target="#exampleModal">Buat Petugas Baru</button>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Buat Petugas Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.register.petugas') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Lengkap</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" name="email">
                <small id="emailHelp" class="form-text text-muted">Masukan email anda!</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password">
                <small id="emailHelp" class="form-text text-muted">Masukan password harus lebih dari 6 karakter!</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirmation">
                <small id="emailHelp" class="form-text text-muted">Password ini harus sama dengan inputan password diatas!</small>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Buat</button>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection
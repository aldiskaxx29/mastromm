@extends('template_admin/app')

@section('title','Profil Admin')

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@yield('title')</h1>
      </div>

      <div class="section-body">
          <div class="card">
              <div class="card-body">
                @if (session('user'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('user')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('profil') }}/{{ $user->foto_user }}" alt="" width="100%" style="border-radius100%;">
                    </div>
                    <div class="col-md-8">
                        <h4 style="margin-left:20px;">Data User</h4>
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $user->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <td>:</td>
                                <td>{{ $user->no_telepon }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $user->alamat }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
              </div>
          </div>

          <div class="card">
              <div class="card-body">
                  <h3 style="text-align:center;">Update Profil</h3>
                  <div class="row justify-content-center">
                      <div class="col-md-6">
                          <form action="{{ url('ubah_profil') }}/{{ $user->id }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                  <label for="">Nama</label>
                                  <input type="text" name="nama" id="" class="form-control" value="{{ $user->nama }}">
                                  @error('nama')
                                      <small class="text-danger">{{ $message }}</small>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="">Email</label>
                                  <input type="email" name="email" id="" class="form-control" value="{{ $user->email }}">
                                  @error('email')
                                      <small class="text-danger">{{ $message }}</small>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="">Username</label>
                                  <input type="text" name="username" id="" class="form-control" value="{{ $user->username }}">
                                  @error('username')
                                      <small class="text-danger">{{ $message }}</small>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="">No Telepon</label>
                                  <input type="text" name="no_telepon" id="" class="form-control" value="{{ $user->no_telepon }}">
                                  @error('no_telepon')
                                      <small class="text-danger">{{ $message }}</small>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="">Alamat</label>
                                  <textarea name="alamat" id="" rows="3" class="form-control">{{ $user->alamat }}</textarea>
                                  @error('alamat')
                                      <small class="text-danger">{{ $message }}</small>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="">Foto Profil</label>
                                  <input type="file" name="foto_profil" id="" class="form-control">
                              </div>
                              <button type="submit" class="btn btn-warning">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
</div>

@endsection
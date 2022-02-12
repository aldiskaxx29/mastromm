@extends('template.app')

@section('title','Profil')

@section('navbar')
    <h3 id="detail" class="form-inline mr-auto" style="font-weight:bold;color:rgb(255, 89, 29);">Halaman User</h3>
@endsection

@section('content')
    <div class="container">
        {{-- <div class="row"> --}}
            <div class="card">
                <div class="card-body">
                    <h4>Profil User</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ url('profil') }}/{{ $user->foto_user }}" alt="" width="100%" style="border-radius100%;">
                        </div>
                        <div class="col-md-8">
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
                                    <th>Toko</th>
                                    <td>:</td>
                                    <td>{{ $user->toko }}</td>
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
                                {{-- <tr>
                                    <th>Foto Profil</th>
                                    <td>:</td>
                                    <td>
                                        <img src="{{ url('profil') }}/{{ $user->foto_user }}" alt="" width="50px">
                                    </td>
                                </tr> --}}
                            </table>
                        </div>
                    </div>

                    
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h3 class="text-center"><i class="fas fa-edit"></i> Update User</h3>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{ url('ubah_profile') }}/{{ $user->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" id="" class="form-control" value="{{ $user->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="" class="form-control" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Toko</label>
                                    <input type="text" name="toko" id="" class="form-control" value="{{ $user->toko }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" id="" class="form-control" value="{{ $user->username }}">
                                </div>
                                <div class="form-group">
                                    <label for="">no Telepon</label>
                                    <input type="text" name="no_telepon" id="" class="form-control" value="{{ $user->no_telepon }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $user->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto user</label>
                                    <input type="file" name="foto_user" id="" class="form-control">
                                </div>
                                <button type="submit" class="btn" style="background:rgb(255, 89, 29);color:white;font-weight:bold;">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@extends('template.app')

@section('title','Ubah Alamat')

@section('navbar')
    <h3 id="detail" class="form-inline mr-auto font-weight-bold"  style="color:rgb(255, 89, 29);">Ubah Alamat</h3>
@endsection
    
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('ubahAlamatPost') }}/{{ $user->id }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="" class="form-control" value="{{ $user->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="">No Telepon</label>
                                <input type="numeric" name="no_telepon" id="" class="form-control" value="{{ $user->no_telepon }}">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id=""  rows="3" class="form-control">{{ $user->alamat }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-warning btn-sm">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
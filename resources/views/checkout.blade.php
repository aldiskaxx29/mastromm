@extends('template.app')

@section('title','Checkout')

@section('navbar')
    <h3 id="detail" class="form-inline mr-auto font-weight-bold"  style="color:rgb(255, 89, 29);">Checkout Barang</h3>
@endsection

@section('content')

<div class="container">
    {{-- <div class="row justify-content-center"> --}}
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ url('bayar') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Penerima</label>
                                <input type="text" name="nama" id="" class="form-control" value="{{ $user->nama }}">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">No Telepon Penerima</label>
                                <input type="text" name="no_telepon" id="" class="form-control" value="{{ $user->no_telepon }}">
                                @error('no_telepon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Penerima</label>
                                <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $user->alamat }}</textarea>
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn" style="background:rgb(255, 89, 29);color:white;font-weight:bold;">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    {{-- </div> --}}
</div>    
@endsection
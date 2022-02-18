@extends('template_admin/app')

@section('title','Data Produk')

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@yield('title')</h1>
      </div>

      <div class="section-body">
        <div class="card">
            <div class="card-body" style="overflow-x: auto;">
              @if (session('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button></div>
              @endif
              <a href="" class="btn btn-warning" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</a>
              <hr>
                <table class="table" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Foto Produk</th>
                      <th>Stok</th>
                      <th>Harga</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($produk as $no => $item)
                        <tr>
                          <td>{{ $no+1 }}</td>
                          <td>{{ $item->nama_produk }}</td>
                          <td class="foto-bukti text-center" style="cursor: pointer;">
                            <img src="{{ asset('produk/' .  $item->foto_produk )}}" alt="" width="50">
                          </td>
                          <td>{{ $item->stok }}</td>
                          <td>Rp. {{ number_format($item->harga,'0',',','.') }}</td>
                          <td>
                            {{-- <a href="{{ url('hapus_barang') }}/{{ $item->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Di Hapus')"><i class="fas fa-trash"></i></a> --}}
                            <form action="{{ url('hapus_barang') }}/{{ $item->id }}" method="post">
                              @csrf
                              @method('DELETE')
                              <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-danger show_confirm"><i class="fas fa-trash"></i></button>
                                <a href="{{ url('ubah_barang') }}/{{ $item->id }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('detail_barang') }}/{{ $item->id }}" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                              </div>
                            </form>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
      </div>
    </section>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('tambah_barang') }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="">Nama Produk</label>
            <input type="hidden" name="kode" class="form-control" value="{{ $kode }}">
            <input type="text" name="nama_produk" id="" class="form-control">
            @error('nama_produk')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Kategori Produk</label>
            <select name="kategori" id="" class="form-control">
              <option value=" ">-- Pilihan --</option>
              @foreach ($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
              @endforeach
              @error('kategori')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </select>
          </div>
          <div class="form-group">
            <label for="">Merek Produk</label>
            <select name="merek" id="" class="form-control">
              <option value=" ">-- Pilihan --</option>
              @foreach ($merek as $item)
                <option value="{{ $item->id }}">{{ $item->merek }}</option>
              @endforeach
              @error('merek')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </select>
          </div>
          <div class="form-group">
            <label for="">Promo Produk</label>
            <select name="promo" id="" class="form-control">
              <option value=" ">-- Pilihan --</option>
              @foreach ($promo as $item)
                <option value="{{ $item->id }}">{{ $item->id }}</option>
              @endforeach
              @error('promo')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </select>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga" id="" class="form-control">
                @error('harga')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Stok </label>
                <input type="number" name="stok" id="" min="1" class="form-control">
                @error('stok')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Foto Produk</label>
                <input type="file" name="foto_produk" id="" class="form-control">
                @error('foto_produk')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Detail Produk</label>
            <select name="detail" id="" class="form-control">
              <option value=" ">-- Pilihan --</option>
              @foreach ($detail as $item)
                <option value="{{ $item->id }}">{{ $item->deskripsi }}</option>
              @endforeach
              @error('detail')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </select>
          </div>
          
          <div class="float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
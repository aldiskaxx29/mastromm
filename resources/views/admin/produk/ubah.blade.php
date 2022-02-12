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
            <div class="card-body">
              <a href="{{ url('produk_barang') }}" class="btn btn-secondary">Back</a>
              <hr>
                <form action="{{ url('update_barang') }}/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" name="nama_produk" id="" class="form-control" value="{{ $produk->nama_produk }}">
                        @error('nama_produk')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Kategori Produk</label>
                      <select name="kategori" id="" class="form-control">
                        @foreach ($kategori as $k)
                          @if ($k->id == $produk->kategori_id)
                            <option value="{{ $k->id }}" selected>{{ $k->kategori }}</option>
                          @else
                            <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                          @endif
                        @endforeach
                        @error('kategori')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="">Merek</label>
                    <select name="merek" id="" class="form-control">
                      @foreach ($merek as $m)
                        @if ($m->id == $produk->merek_id)
                          <option value="{{ $m->id }}" selected>{{ $m->merek }}</option>
                        @else
                          <option value="{{ $m->id }}">{{ $m->merek }}</option>
                        @endif
                      @endforeach
                      @error('merek')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Promo Produk</label>
                    <select name="promo" id="" class="form-control">
                      @foreach ($promo as $p)
                          @if ($p->id == $produk->promo_id)
                            <option value="{{ $p->id }}" selected>{{ $p->promo }}</option>
                          @else
                            <option value="{{ $p->id }}">{{ $p->promo }}</option>
                          @endif
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
                        <input type="text" name="harga" id="" class="form-control" value="{{ $produk->harga }}">
                        @error('harga')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" name="stok" id="" class="form-control" value="{{ $produk->stok }}">
                        @error('stok')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Foto Produk</label>
                        <img class="foto-bukti" src="{{ asset('produk/' .$produk->foto_produk) }}" alt="" width="70px" style="margin-left:20px;margin-bottom:-10px;margin-top:-30px;">
                        <input type="file" name="foto_produk" id="" class="form-control" value="{{ $produk->foto_produk }}">
                        <small class="text-info">Biarkan jka tidak ingin di ubah</small>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Detail Produk</label>
                    <select name="detail" id="" class="form-control">
                      @foreach ($detail as $d)
                          @if ($d->id == $produk->detail_produk_id)
                              <option value="{{ $d->id }}" selected>{{ $d->deskripsi }}</option>
                          @else
                            <option value="{{ $d->id }}">{{ $d->deskripsi }}</option>
                          @endif
                      @endforeach
                    </select>
                    @error('detail')
                            <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-warning">Upadet</button>
                </form>
            </div>
        </div>
      </div>
    </section>
</div>

@endsection
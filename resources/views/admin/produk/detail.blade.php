@extends('template_admin/app')

@section('title','Detail Produk')

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@yield('title')</h1>
      </div>

      <div class="section-body">
        <div class="card">
            <div class="card-body" style="overflow-x: auto;">
                <a href="{{ url('produk_barang') }}" class="btn btn-sm btn-secondary">Back</a>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('produk/' . $produk->foto_produk) }}" alt="" width="100%">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            {{-- @foreach ($produk as $item) --}}
                            <tr>
                                <th>Nama Barang</th>
                                <td>:</td>
                                <td>{{ $produk->nama_produk }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>:</td>
                                <td>{{ $produk->kategori }}</td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>:</td>
                                <td>{{ $produk->stok }}</td>
                            </tr>
                            <tr>
                                <th>Merek</th>
                                <td>:</td>
                                <td>{{ $produk->merek }}</td>
                            </tr>
                            <tr>
                                <th>Harga Barang</th>
                                <td>:</td>
                                <td>Rp. {{ number_format($produk->harga,'0',',','.') }}</td>
                            </tr>
                            {{-- @endforeach --}}
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
      </div>
    </section>
</div>

@endsection
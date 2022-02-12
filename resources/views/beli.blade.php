
@extends('template.app')

@section('title','Data Beli')

@section('navbar')
    <h3 id="detail" class="form-inline mr-auto font-weight-bold" style="color:rgb(255, 89, 29);">Data Beli</h3>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="overflow-x:auto;">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                        {{-- <form action="{{ url('confirm-checkout') }}" method="post"> --}}
                        <form action="{{ url('bayar') }}" method="post">
                            @csrf
                            {{-- <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No Telepon</label>
                                <input type="numeric" name="no_telepon" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id=""  rows="5" class="form-control"></textarea>
                            </div> --}}
                            {{-- <strong>{{ $user->nama }}</strong> <small class="badge badge-warning">Utama</small><br> --}}
                            {{-- <small type="text" name="no" value="{{ $user->no_telepon }}">{{ $user->no_telepon }}</small><br> --}}
                            {{-- <small>{{ $user->alamat }}</small> --}}
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <strong>Alamat Pengiriman</strong>
                                    <hr>
                                <div class="form-group">
                                    <input type="text" name="nama" id="" value="{{ $user->nama }}" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <input type="text" name="no_telepon" id="" value="{{ $user->no_telepon }}" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <textarea name="alamat" id="" cols="30" rows="3" class="form-control" >{{ $user->alamat }}</textarea>
                                </div>
                                {{-- <button type="button" class="btn btn-success text-right" style="float: right;" data-toggle="modal" data-target="#alamatModal">
                                    Tambah Alamat
                                </button> --}}
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <strong>Pilih Metode Pembayaran</strong>
                                    <hr>
                                    <div class="form-group">
                                        <select class="form-control" name="pembayaran" required>
                                            {{-- <option value=" ">-- Pilihan --</option> --}}
                                            <option value="1">CAS</option>
                                            <option value="2">COD</option>
                                            <option value="3">TOP</option>
                                        </select>
                                        {{-- <small class="text-danger">Wajib di isi</small> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- @if ($alamat_alternatif)
                                <div class="row">
                                    <div class="col-md-6 mx-auto justify-content-center">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <strong>Alamat Alternatif</strong>
                                            </div>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Penerima</th>
                                                        <th>No Telepon</th>
                                                        <th>Alamat</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="value_alamat">
                                                    @foreach ($alamat_alternatif as $alamat)
                                                        <tr>
                                                            <td>{{ $alamat->nama_alternatif }}</td>
                                                            <td>{{ $alamat->no_telepon_alternatif }}</td>
                                                            <td>{{ $alamat->alamat_alternatif }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif --}}
                        </div>
                    </div>
                    <table class="table mt-3">
                        {{-- <strong>Barang Yang di beli</strong> --}}
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Produk</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Jumlah Harga</th>
                            </tr>
                        </thead>
                    {{-- </table> --}}
                {{-- </div> --}}
            {{-- </div> --}}
        {{-- @if (!empty($keranjang))     --}}
                    <tbody>
                        @foreach ($product as $row)
                            <tr>
                                <input type="hidden" name="id_produk[]" id="" value="{{ $row['product_id'] }}">
                                {{-- <input type="number" name="id_produk[{{$value->produk_id}}]" id="" value="{{ $value->produk_id }}"> --}}
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('produk/' . $row['foto_produk'] )}}" alt="" width="100"></td>
                                <td>{{ $row['nama_product'] }}</td>
                                <td width="60px">
                                    <input type="numeric" name="jumlah[]" value="{{ $row['jumlah'] }}" class="form-control" width="60px" readonly></td>
                                {{-- <td>Rp.{{ number_format($harga[$value->id]) }}</td> --}}
                                <td  width="200px">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="numeric" name="harga[]" id="" class="form-control" value="{{ $row['harga'] }}" readonly>
                                    </div>
                                </td>
                                {{-- <td name="hasil" value="{{ number_format($hasil[$value->id]) }}">Rp.{{ number_format($hasil[$value->id]) }}</td> --}}
                                <td>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="numeric" name="hasil[]" id="" value="{{ $row['hasil'] }}" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="5" align="right" style="font-weight:bold;">Total Bayar</td>
                            <td>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="numeric" name="total" id="" value="{{ $total_harga }}" class="form-control" readonly>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="6" align="right">
                                <button type="submit" class="btn" style="background:rgb(255, 89, 29);color:white;font-weight:bold;">Beli</button>
                            </td>
                        </tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- @endif --}}

        </div>
    </div>

    <div class="modal" id="alamatModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Alamat Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="nama_alternatif" id="nama_alternatif" placeholder="nama" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="no_telepon_alternatif" id="no_telepon_alternatif" placeholder="no_telepon" class="form-control" >
                        </div>
                        <div class="form-group">
                            <textarea name="alamat_alternatif" id="alamat_alternatif" cols="30" rows="3" class="form-control" >alamat</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="tambah_alamat">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

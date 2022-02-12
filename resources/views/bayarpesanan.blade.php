@extends('template.app')

@section('title','Bayar Pesanan')

@section('navbar')
    <h3 id="detail" class="form-inline mr-auto font-weight-bold"  style="color:rgb(255, 89, 29);">Detail Transaksi</h3>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="card" style="padding: 30px;overflow-x:auto;">
            <div class="card-body">
                <strong><center>Nomer Rekening</center></strong>
                <strong style="color:rgb(255, 89, 29);"><center>234567778667987</center></strong>
                <strong><center> Selesaikan Pembayaran Anda</center></strong>
                <small><center>Batas Akhir Pembayaran</center></small>
                <strong><center>{{ $tanggalbesok }}</center></strong>
                <hr>
                <strong>{{ $user->nama }}</strong> <small class="badge badge-warning">Alamat Pengirirman</small><br>
                <small type="text" name="no" value="{{ $user->no_telepon }}">{{ $user->no_telepon }}</small><br>
                <small>{{ $user->alamat }}</small>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>Foto Produk</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Jumlah Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($produk as $no => $pesanan)
                        <tr>
                            <td>
                                <img src="{{ asset('produk/' . $pesanan->foto_produk )}}" alt="" width="100">
                            </td>
                            <td>{{ $pesanan->nama_produk }}</td>
                            <td>{{ $pesanan->qty }}</td>
                            @if ($pesanan->status == '1')
                                <td>RP. {{ number_format($pesanan->harga-$pesanan->harga*$pesanan->promo/100,0,',','.') }}</td>
                            @else
                                <td>Rp. {{ number_format($pesanan->harga,0,',','.') }}</td>
                            @endif

                            <td>Rp. {{ number_format($pesanan->sub_total,0,',','.') }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" align="right"><b>Total Harga</b></td>
                            <td style="font-weight:bold;color:rgb(255, 89, 29);">Rp. {{ number_format($jml,'0',',','.') }}</td>
                        </tr>    --}}
                        @foreach ($pesanans as $row)
                            <tr>
                                {{-- <input type="hidden" name="id_produk[]" id="" value="{{ $value->produk_id }}"> --}}
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td><img src="{{ asset('produk/' . $row['foto_produk'] )}}" alt="" width="100"></td>
                                <td>{{ $row['nama_produk'] }}</td>
                                {{-- <td>Rp.{{ number_format($jumlah[$key]) }}</td> --}}
                                {{-- <td>{{ $jumlah[$key] }}</td> --}}
                                <td width="60px">
                                    {{-- <input type="numeric" name="jumlah" id="" value="{{ $jumlah[$key] }}" class="form-control" width="60px" readonly> --}}
                                    {{ $row['jumlah'] }}
                                </td>
                                {{-- <td>Rp.{{ number_format($harga[$key]) }}</td> --}}
                                <td width="100px;">
                                    {{-- <input type="numeric" name="harga" id="" class="form-control" value="{{ $harga[$key] }}" readonly> --}}
                                    Rp. {{ number_format($row['harga'],0,',','.') }}
                                </td>
                                {{-- <td name="hasil" value="{{ number_format($hasil[$key]) }}">Rp.{{ number_format($hasil[$key]) }}</td> --}}
                                <td width="150px;">
                                    {{-- <input type="numeric" name="hasil" id="" value="{{ $hasil[$key] }}" class="form-control" readonly> --}}
                                    Rp. {{ number_format($row['hasil'],0,',','.') }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="4" align="right" style="font-weight:bold;color:rgb(255, 89, 29);">Total Bayar</td>
                            {{-- <td>Rp {{ number_format($total_harga) }}</td> --}}
                            <td style="font-weight:bold;">
                                {{-- <input type="numeric" name="total" id="" value="{{ $total_harga }}" class="form-control" readonly> --}}
                                Rp. {{ number_format($total_harga,0,',','.') }}
                            </td>

                        </tr>

                        <tr>
                            <td colspan="4">
                                <strong>Kofirmasi Pembayaran melalu Nomer Whatsapp <a href="https://api.whatsapp.com/send?phone=62895334930931&text=Hallo%20Admin%20Saya%20Ingin%20Konfirmasi" class="text-success" target="_blank">089098788724</a></strong>
                            </td>
                        </tr>
                    </tbody>
            </table>
            </div>
        </div>
    </div>
</div>




@endsection

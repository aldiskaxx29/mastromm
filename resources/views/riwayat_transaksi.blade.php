@extends('template.app')

@section('title','Riwayat Transaksi')

@section('navbar')
    <h3 id="detail" class="form-inline mr-auto font-weight-bold"  style="color:rgb(255, 89, 29);">Riwayat Belanja</h3>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="overflow-y: auto;">
                    @if (session('transaksi'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('transaksi')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button></div>
                    @endif
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Kode Transaksi</th>
                                <th>Nama Produk</th>
                                <th>Harga Produk</th>
                                <th>Qty</th>
                                <th>Total Pesanan</th>
                                <th>Status</th>
                                <th>No Rekening</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($pesanan))
                                <div class="alert alert-danger">Belum Ada Pesanan! Silahkan Pesan</div>
                                <a href="{{ url('dashboard') }}" class="btn btn-warning">Belanja</a>
                                <hr>
                            @else
                                    @foreach ($pesanan_detail as $no => $item)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td id="foto-bukti"><img src="{{ asset('produk/' . $item->foto_produk )}}" alt="" width="100"></td>
                                        <td style="font-size:12px;font-weight:bold;">{{ $item->kode_transaksi }}</td>
                                        <td style="font-size:12px;font-weight:bold;">{{ $item->nama_produk }}</td>
                                        {{-- @if (!empty($item->promo)) --}}
                                            {{-- <td>Rp. {{ number_format($item->harga-$item->harga*50/100,0,',','.') }}</td> --}}
                                            {{-- <td>Rp. {{ number_format($item->harga,0,',','.')}}</td> --}}
                                        @if ($user->level_id == 4)
                                            @if ($item->promo_bronze)
                                                <td>Rp. {{ number_format($item->harga-$item->harga*$item->promo_bronze/100,0,',','.') }}</td>
                                            @else
                                                <td>Rp. {{number_format($item->harga,0,',','.')}}</td>
                                            @endif
                                        @elseif($user->level_id == 5)
                                            @if ($item->promo_silver)
                                                <td>Rp. {{ number_format($item->harga-$item->harga*$item->promo_silver/100,0,',','.') }}</td>
                                            @else
                                                <td>Rp. {{number_format($item->harga,0,',','.')}}</td>
                                            @endif
                                        @elseif($user->level_id == 6)
                                            @if ($item->promo_gold)
                                                <td>Rp. {{ number_format($item->harga-$item->harga*$item->promo_gold/100,0,',','.') }}</td>
                                            @else
                                                <td>Rp. {{number_format($item->harga,0,',','.')}}</td>
                                            @endif
                                        @endif
                                        {{-- @else    --}}
                                            {{-- <td>Rp. {{ number_format($item->harga,0,',','.') }}</td> --}}
                                        {{-- @endif --}}
                                        <td>{{ $item->qty }}</td>
                                            <td>Rp. {{ number_format($item->sub_total,0,',','.')}}</td>
                                        <td>
                                            @if ($item->status == '0')
                                                <small class="badge badge-danger" data-toggle="modal" data-target=".bd-example-modal-sm{{ $item->transaksi_id }}"  style="cursor: pointer;">Menunggu Konfirmasi</small>
                                            @elseif($item->status == '1')
                                                <small class="badge badge-warning" data-toggle="modal" data-target=".bd-example-modal-sm{{ $item->transaksi_id }}"  style="cursor: pointer;">Proses</small>
                                            @elseif($item->status == '2')
                                                <small class="badge badge-info" data-toggle="modal" data-target=".bd-example-modal-sm{{ $item->transaksi_id }}"  style="cursor: pointer;">Dalam Pengiriman</small>
                                            @elseif($item->status == '3')
                                                <small class="badge badge-success" data-toggle="modal" data-target=".bd-example-modal-sm{{ $item->transaksi_id }}"  style="cursor: pointer;">Selesai</small>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($item->status !== 0)
                                                <strong style="color:rgb(255, 89, 29);">9416783618621</strong><br>
                                                <small>BCA</small>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        {{-- <td>{{ $item->jumlah_harga }}</td> --}}
                                    </tr>
                                    @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
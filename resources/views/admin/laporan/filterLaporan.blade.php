@extends('template_admin/app')

@section('title','Data Laporan')

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@yield('title')</h1>
      </div>

      <div class="section-body">
        <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-5">
                  <form action="{{ url('filterLaporan')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="">Tanggal Dari</label>
                      <input type="date" name="dari" id="" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Tanggal Sampai</label>
                      <input type="date" name="sampai" id="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning" target="_blank">Search</button>
                  </form>
                </div>
              </div>
            </div>
        </div>

        <div class="card">
            {{-- <div class="card-header">
                <h3>Data Laporan</h3>
            </div> --}}
          <div class="card-body">
              {{-- <div class="tak"> --}}
                  {{-- <h3 style="float:left;">Data Lapoaran</h3> --}}
                  <a href="{{ url('cetakLaporan') }}/{{ $dari }}/{{ $sampai }}" class="btn btn-danger" style="float: right;" target="_blank"><i class="fas fa-print"></i> Cetak Laporan</a>
              {{-- </div> --}}
              {{-- <div> --}}
                  <strong>Laporan Dari Tanggal {{ $dari }} <br> Sampai Tanggal {{ $sampai }}</strong>
              {{-- </div> --}}
            <hr>
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      {{-- <th>No Telepon</th> --}}
                      <th>Kode Transaksi</th>
                      {{-- <th>Alamat</th> --}}
                      <th>Tanggal Pesan</th>
                      <th>Nama Penerima</th>
                      <th>Total Produk</th>
                      <th>Total Harga</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                
                @if ($laporan->count() == 0)
                    <div class="alert alert-danger">
                        <strong>Belum Ada Transaksi</strong>
                    </div>
                @else
                @foreach ($laporan as $no => $item)
                <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$item->nama_produk}}</td>
                    {{-- <td>{{$item->no_telepon}}</td> --}}
                    <td>{{ $item->kode_transaksi }}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{ $item->nama_penerima }}</td>
                    <td>{{ $item->total_produk }}</td>
                    <td>Rp. {{ number_format($item->total_harga,0,',','.') }}</td>
                    {{-- @if (!empty($item->promo))
                            
                            <td>Rp. {{ number_format($item->harga-$item->harga*$item->promo/100,0,',','.')}}</td>
                        @else   
                            <td>Rp. {{ number_format($item->harga,0,',','.') }}</td>
                    @endif  --}}
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
                    {{-- <td>{{ $item->alamat }}</td> --}}
                    <td><a href="{{ url('cetak_satuan') }}/{{ $dari }}/{{ $sampai }}/{{ $item->id }}" target="__blank" class="btn btn-info btn-sm"><i class="fas fa-print"></i></a></td>
                </tr>                    
                @endforeach

                @endif
              </tbody>
          </table>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection
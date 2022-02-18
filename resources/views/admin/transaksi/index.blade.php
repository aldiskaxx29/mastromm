@extends('template_admin/app')

@section('title','Data Transaksi')

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@yield('title')</h1>
      </div>

      <div class="section-body">
        <div class="card">
            <div class="card-body" style="overflow-x: auto;">
              @if (session('transaksi'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('transaksi')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
              @endif
              <a href="{{ url('cetakTransaksi') }}" class="btn btn-sm btn-danger"><i class="fas fa-file"></i> Cetak Pdf</a>
              <hr>
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    {{-- <th>No Telepon</th> --}}
                    <th>Kode Transaksi</th>
                    {{-- <th>Alamat</th> --}}
                    <th>Tanggal Pesan</th>
                    <th>Nama Penerima</th>
                    <th>Jumlah Produk</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pesan as $no => $item)
                      <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        {{-- <td>{{ $item->no_telepon }}</td> --}}
                        <td>{{ $item->kode_transaksi }}</td>
                        {{-- <td>{{ $item->alamat }}</td> --}}
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->nama_penerima }}</td>
                        <td>{{ $item->qty }}</td>
                        {{-- <td>Rp. {{ number_format($item->jumlah_harga,0,',','.') }}</td> --}}
                        @if (!empty($item->promo))
                            {{-- <td>Rp. {{ number_format($item->harga-$item->harga*50/100,0,',','.') }}</td> --}}
                            <td>Rp. {{ number_format($item->harga-$item->harga*$item->promo/100,0,',','.')}}</td>
                        @else   
                            <td>Rp. {{ number_format($item->harga,0,',','.') }}</td>
                        @endif
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
                        <td>
                          <form action="{{ url('hapusTransaksi') }}/{{ $item->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                              <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fas fa-trash"></i></button>
                              {{-- <a href="{{ url('ubahTransaksi') }}/{{ $item->transaksi_id }}" class="btn btn-info btn-sm" ><i class="fas fa-edit"></i></a> --}}
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


<!-- Small modal -->
@foreach ($pesan as $item)
<div class="modal fade bd-example-modal-sm{{ $item->transaksi_id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card">
        <div class="card-body">
            {{-- <a href="" class="btn btn-block btn-warning">Menunggu Konfirmasi</a>
            <a href="" class="btn btn-block btn-info">Proses</a>
            <a href="" class="btn btn-block btn-success">Selesai</a>
            <input type="text" name="" id="" class="btn btn-block btn-warning"> --}}
            <form action="{{ url('ubahstatus') }}/{{ $item->transaksi_id }}" method="post">
              @csrf
              <select name="status" id="" class="form-control">
                <option value="0" @if ($item->status == 0) selected @endif>Menunggu Konfirmasi</option>
                <option value="1" @if ($item->status == 1) selected @endif>Proses</option>
                <option value="2" @if ($item->status == 2) selected @endif>Dalam Pengiriman</option>
                <option value="3" @if ($item->status == 3) selected @endif>Selesai</option>
              </select>
              <button type="submit" class="btn btn-warning float-right mt-2">Ubah</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>    
@endforeach


@endsection
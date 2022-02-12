<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Cetak laporan</title>
  </head>
  <body>
    <h1 class="text-center">Data Laporan Pesanan</h1>
    <br>
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
                <th>Jumlah Produk</th>
                <th>Jumlah Harga</th>
                <th>Status</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $no => $item)
            <tr>
                <td>{{$no+1}}</td>
                <td>{{$item->nama_produk}}</td>
                {{-- <td>{{$item->no_telepon}}</td> --}}
                <td>{{ $item->kode_transaksi }}</td>
                <td>{{$item->created_at}}</td>
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
            </tr>                    
            @endforeach
        </tbody>
    </table>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
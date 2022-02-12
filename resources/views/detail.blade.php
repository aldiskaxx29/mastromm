@extends('template.app')

@section('title','Detail Produk')

@section('navbar')
    <h3 id="detail" class="form-inline mr-auto font-weight-bold"  style="color:rgb(255, 89, 29);">Detail Barang</h3>
@endsection

@section('content')

<div class="container">
    {{-- <div class="row justify-content-center"> --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="col">
                            <div class="card" style="cursor: zoom-in;">
                                <img src="{{ url('produk/' . $barang->foto_produk) }}" width="100%">
                                {{-- <strong style="position:absolute;margin-top:360px;color:white;margin-left:10px;font-size:24px;">{{ $barang->nama_produk }}</strong> --}}
                                <strong style="margin-left:30px;margin-bottom:30px;">{{ $barang->nama_produk }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                            <h1 class="mb-3">{{ $barang->nama_produk }}</h1>
                        <table class="table">
                            <tbody>
                                <strong>Spesifikasi Produk</strong>
                                @if ($user->level_id == 4)
                                    @if ($barang->status == '1')
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td><small class="text-danger" style="background: rgb(255, 197, 197);font-size:11px;">{{ $barang->promo_bronze }}% promo bronze</small> <s>Rp. {{number_format($barang->harga,0,',','.')}}</s> - <strong style="color:rgb(255, 89, 29);font-size:19px;">Rp. {{ number_format($barang->harga-$barang->harga*$barang->promo_bronze/100,0,',','.') }}</strong></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{number_format($barang->harga,0,',','.')}}</td>
                                        <td></td>
                                    @endif
                                @elseif($user->level_id == 5)
                                    @if ($barang->status == '1')
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td><small class="text-danger" style="background: rgb(255, 197, 197);font-size:11px;">{{ $barang->promo_silver }}% promo silver</small> <s>Rp. {{number_format($barang->harga,0,',','.')}}</s> - <strong style="color:rgb(255, 89, 29);font-size:19px;">Rp. {{ number_format($barang->harga-$barang->harga*$barang->promo_silver/100,0,',','.') }}</strong></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{number_format($barang->harga,0,',','.')}}</td>
                                        <td></td>
                                    @endif
                                @elseif($user->level_id == 6)
                                    @if ($barang->status == '1')
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td><small class="text-danger" style="background: rgb(255, 197, 197);font-size:11px;">{{ $barang->promo_gold }}% promo gold</small> <s>Rp. {{number_format($barang->harga,0,',','.')}}</s> - <strong style="color:rgb(255, 89, 29);font-size:19px;">Rp. {{ number_format($barang->harga-$barang->harga*$barang->promo_gold/100,0,',','.') }}</strong></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{number_format($barang->harga,0,',','.')}}</td>
                                        <td></td>
                                    @endif
                                @endif
                                
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>{{ $barang->kategori }}</td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td>{{ $barang->stok }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>{{ $barang->deskripsi }}</td>
                                </tr>

                                {{-- keranjang --}}
                                {{-- <form action="{{ url('pesan') }}/{{ $barang->id }}" method="post"> --}}
                                    {{-- bayar --}}
                                {{-- <form action="{{ url('langsung_konfirm-checkout') }}/{{ $barang->id }}" method="POST"> --}}
                                {{-- @csrf --}}
                                    {{-- <tr>
                                        <td>Jumlah</td>
                                        <td>:</td>
                                        <td><input type="number" class="form-control" name="jumlah_pesan" value="1" style="width:70px;"min="1"></td>
                                    </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-3 col-md-6 col-sm-6 mb">
                        {{-- <a href="{{ url('promo1') }}" class="btn btn-light " style="border:1px solid rgb(255, 89, 29);width:200px;color:rgb(255, 89, 29);">Promo 1</a> --}}
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        {{-- <a href="{{ url('promo2') }}" class="btn btn-light t" style="border:1px solid rgb(255, 89, 29);width:200px;color:rgb(255, 89, 29);">Promo 2</a> --}}
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 mb">
                        @if ($barang->stok == 0)
                        <button type="button" class="btn btn-light " style="border:1px solid rgb(161, 161, 161);width:200px;color:rgb(161, 161, 161);" onclick="return alert('Stok Barang Habis!')"><i class="fa fa-shopping-cart"></i> Masukan Keranjang</button>
                        @else   
                            <a href="{{ url('tambah-keranjang') }}/{{ $barang->id }}" class="btn btn-light " style="border:1px solid rgb(255, 89, 29);width:200px;color:rgb(255, 89, 29);"><i class="fa fa-shopping-cart"></i> Masukan Keranjang</a> 
                            {{-- <button type="submit" ></button> --}}
                        @endif
                    </div>
                {{-- </form> --}}
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        @if ($barang->stok == 0)
                            <button type="button" class="btn btn-light " style="border:1px solid rgb(161, 161, 161);width:200px;color:rgb(161, 161, 161);" onclick="return alert('Stok Barang Habis!')">Beli</button>
                        @else   
                        <a href="{{ url('/action_bayar') }}/{{ $barang->id }}" class="btn text-white" style="border:1px solid rgb(255, 89, 29);background:rgb(255, 89, 29);width:200px;">Beli</a>
                        @endif
                        {{-- <button type="submit" formaction="{{ url('/action_bayar') }}/{{ $barang->id }}" class="btn text-white" style="border:1px solid rgb(255, 89, 29);background:rgb(255, 89, 29);width:200px;">Beli</button> --}}
                        
                    </div>
                {{-- </form>     --}}
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="col mt-2">
                <strong style="float:left;">Produk Lain</strong>
                <a href="{{ url('shop') }}"><strong class="text-warning" style="float:right;color:rgb(255, 89, 29);">Lihat Semua</strong></a>
            </div>
            <div class="card-body">
                <div class="row justify-content-center" id="slider">
                    @foreach ($barangs as $item)
                    <div class="col-md-12">
                        <div class="card" style="width: 16rem;" >
                          <div class="card-body">
                            <a href="{{ url('pesan/' . $item->id) }}" style="text-decoration: none;">
                                <img class="card-img-top" src="{{ url('produk')}}/{{ $item->foto_produk }}" alt="Card image cap">       
                                <strong style="color:black;font-size:14px;">{{ $item->nama_produk }}</strong>
                            </a>
                          </div>
                        </div>
                    </div>
                    @endforeach
                  </div>
            </div>
        </div>
    {{-- </div> --}}
</div>    
@endsection
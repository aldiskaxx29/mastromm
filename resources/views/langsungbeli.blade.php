
@extends('template.app')

@section('title','Data Beli')

@section('navbar')
    <h3 id="detail" class="form-inline mr-auto font-weight-bold" style="color:rgb(255, 89, 29);">Data Beli</h3>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <strong>Alamat Pengiriman</strong>
                                    <hr>
            <form action="{{url('konfirm-beli')}}"  method="post" class="perhitungan">
                @csrf
            <div class="form-group">
                <input type="text" name="nama" id="" value="{{ $user->nama }}" class="form-control" >
            </div>
            <div class="form-group">
                <input type="text" name="no_telepon" id="" value="{{ $user->no_telepon }}" class="form-control" >
            </div>
            <div class="form-group">
                <textarea name="alamat" id="" cols="30" rows="3" class="form-control" >{{ $user->alamat }}</textarea> 
            </div>
            {{-- <a href="{{ url('ubah-alamat') }}" class="btn btn-light btn-sm text-warning">Ubah Alamat</a> --}}
            </div>
        </div>
        {{-- <br> --}}
        <div class="row justify-content-center">
            <div class="card" style="overflow-x:auto;">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- <th>No</th> --}}
                                <th>Foto Produk</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                {{-- <th>Jumlah Harga</th> --}}
                                {{-- <th>Action</th> --}}
                                {{-- <th>id</th> --}}
                            </tr>
                        </thead>
                    {{-- </table> --}}
                {{-- </div> --}}
            {{-- </div> --}}
        @if (!empty($produk))    
                    <tbody>
                        {{-- @foreach ($produk as $no => $produk) --}}
                        <tr>
                            {{-- <td>{{ $no+1 }}</td> --}}
                            <td>
                                <img src="{{ asset('produk/' . $produk->foto_produk )}}" alt="" width="100">
                            </td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td style="width:80px;">
        
                        {{-- <form action="{{url('konfirm-checkout')}}"  method="get" class="perhitungan"> --}}
                                @csrf
                                <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                {{-- <input type="number" name="jumlah_pesan-{{ $produk->id }}" min="1" placeholder="1" class="form-control jumlah" id="jumlah{{$no}}" value="1" data-id="{{ $no }}"> --}}
                                <input type="number" name="jumlah_pesan" min="1" placeholder="1" class="form-control jumlah" id="jumlah{{$produk->id}}" value="1" data-id="{{ $produk->id }}">
                            </td>
                            {{-- @if ($produk->status == '1')
                                
                                <td style="width:200px;">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" name="harga" min="1" placeholder="1" class="form-control harga{{$produk->id}}" id="rupiah" value="{{ $produk->harga-$produk->harga*$produk->promo/100}}" readonly>
                                    </div>
                                </td>
                            @else
                                
                                <td style="width:200px;">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" name="harga" min="1" placeholder="1" class="form-control harga{{$produk->id}}" id="rupiah" value="{{ $produk->harga}}" readonly>
                                    </div>
                                </td>
                            @endif --}}
                            @if ($user->level_id == 4)
                                @if ($produk->status == '1')
                                    {{-- <td id="harga" name="harga">Rp. {{ number_format($produk->harga-$produk->harga*$produk->promo/100,0,',','.') }}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" name="harga" min="1" placeholder="1" class="form-control harga" value="{{ $produk->harga }}" readonly>
                                        </div>
                                    </td>
                                @else
                                    {{-- <td name="harga">Rp. {{number_format($produk->harga,0,',','.')}}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" name="harga" min="1" placeholder="1" class="form-control harga" value="{{ $produk->harga }}" readonly>
                                        </div>
                                    </td>
                                @endif
                            @elseif($user->level_id == 5)
                                @if ($produk->status == '1')
                                    {{-- <td id="harga" name="harga">Rp. {{ number_format($produk->harga-$produk->harga*$produk->promo/100,0,',','.') }}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" name="harga" min="1" placeholder="1" class="form-control harga" id="rupiah" value="{{ $produk->harga }}" readonly>
                                        </div>
                                    </td>
                                @else
                                    {{-- <td name="harga">Rp. {{number_format($produk->harga,0,',','.')}}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" name="harga" min="1" placeholder="1" class="form-control harga" value="{{ $produk->harga }}" id="rupiah" readonly>
                                        </div>
                                    </td>
                                @endif
                            @elseif($user->level_id == 6)
                                @if ($produk->status == '1')
                                {{-- <td id="harga" name="harga">Rp. {{ number_format($produk->harga-$produk->harga*$produk->promo/100,0,',','.') }}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" name="harga" min="1" placeholder="1" class="form-control harga" value="{{ $produk->harga-$produk->harga*$produk->promo_gold/100 }}" id="rupiah" readonly>
                                        </div>
                                    </td>
                                @else
                                    {{-- <td name="harga">Rp. {{number_format($produk->harga,0,',','.')}}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" name="harga" min="1" placeholder="1" class="form-control harga" value="{{ $produk->harga }}" readonly>
                                        </div>
                                    </td>
                                @endif
                            @endif
                            {{-- <td><input type="text" name="hasil-{{ $produk->id }}" id="hasil{{$no}}" class="form-control hasil" ></td> --}}
                            <input type="hidden" name="hasil" id="hasil{{$produk->id}}" class="form-control hasil" >
                            {{-- <td>
                                <a href="{{ url('hapus-keranjang') }}/{{$produk->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Di Haapus')"><i class="fas fa-trash"></i></a>    
                            </td> --}}
                        </tr>
                        {{-- @endforeach --}}
                        <tr>
                            <td colspan="3" align="right" style="font-weight: bold;">Total Harga</td>

                            {{-- <td style="width:200px;"><input type="text" name="total_harga" class="form-control total_harga" id="total_harga" value="" readonly></td> --}}
                        @if ($produk->status == '1')
                            {{-- <td><input type="number" name="harga-{{ $produk->id }}" min="1" placeholder="1" class="form-control harga{{$no}}" id="rupiah" value="{{ $produk->harga-$produk->harga*$produk->promo/100}}" readonly></td> --}}
                            <td style="width:200px;">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" name="total_harga"  placeholder="1" class="form-control total_harga" id="total_harga" value="{{ $produk->harga-$produk->harga*$produk->promo_gold/100}}" readonly>
                                </div>
                            </td>
                        @else
                            {{-- <td><input type="number" name="harga-{{ $produk->id }}" min="1" placeholder="1" class="form-control harga{{$no}}" id="rupiah" value="{{ $produk->harga}}" readonly></td> --}}
                            <td style="width:200px;">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" name="total_harga"  placeholder="1" class="form-control total_harga" id="total_harga" value="{{ $produk->harga}}" readonly>
                                </div>
                            </td>
                        @endif
                        </tr> 
                        <tr>
                            <td colspan="4" align="right">
                                <button type="submit" class="btn" style="background:rgb(255, 89, 29);color:white;font-weight:bold;">Pesan</button>
                            </td>
                        </tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>
        
        @endif

        </div>
    </div>

    
@endsection

@section('script')
<script>
    $(function(){
        $('#pesan').prop('disabled', true);

        $(document).on('change', '.check_produk', function(e){
            let ElTbody = $('#keranjangTable');
            let ElTr = $(this).parent().parent();
            let numberChecked = 0;
            for(var i = 0; i < $(ElTbody.find("tr")).length; i++)
            {
                let BtnPesan = $(ElTbody.find('tr')).eq(i).find('.check_produk');
                if($(BtnPesan).prop("checked")){
                    numberChecked++
                }
            }

            if(numberChecked > 0)
            {
                $('#pesan').prop('disabled', false);
            }else {
                $('#pesan').prop('disabled', true);
            }

            if($(this).prop("checked")) {
                $(ElTr.find('.jumlah')).prop('readonly', false);
                $(ElTr.find('.product-flag')).val(1);
            } else {
                $(ElTr.find('.jumlah')).prop('readonly', true);
                $(ElTr.find('.product-flag')).val(0);
            }

        });
    });

    // $(document).on('keyup', '.jumlah', function(e){
    $(document).on('change', '.jumlah', function(e){
        e.preventDefault();
        let El = $(this).parent().parent();
        calculationPrice(El);
    });

    function calculationPrice(El)
    {
        let qty = $(El.find('.jumlah')).val();
        let price = $(El.find('.harga')).val();
        let amount = qty * price;
        $(El.find('.hasil')).val(amount);

        // Total Harga
        let Amounts = $('.hasil');
        var subTotal = 0;
        for (var i = 0; i < Amounts.length; i++) {
            subTotal = parseFloat(subTotal) + parseFloat($(Amounts[i]).val());
        }
        $('.total_harga').val(subTotal);
    }
</script>
@endsection

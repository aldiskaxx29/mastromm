@extends('template.app')

@section('title','Data Keranjang')

@section('navbar')
    <h3 id="detail" class="form-inline mr-auto font-weight-bold" style="color:rgb(255, 89, 29);">Keranjang Belanja</h3>
@endsection

@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="overflow-x:auto;">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Produk</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Jumlah Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                @php
                    $totalHarga = 0;
                @endphp
                @if (!empty($keranjang))
                    <tbody id="keranjangTable">
                        <form action="{{url('konfirm-checkout')}}"  method="post" class="perhitungan">
                            @csrf
                        @foreach ($keranjang as $no => $pesan_detail)
                        @php
                        if ($user->level_id == 4) {
                            if ($pesan_detail->status == '1') {
                                $amount = 1 * $pesan_detail->harga-$pesan_detail->harga*$pesan_detail->promo_bronze/100;
                            } else {
                                $amount = 1 * $pesan_detail->harga;
                            }
                        } elseif($user->level_id == 5) {
                            if ($pesan_detail->status == '1') {
                                $amount = 1 * $pesan_detail->harga-$pesan_detail->harga*$pesan_detail->promo_silver/100;
                            } else {
                                $amount = 1 * $pesan_detail->harga;
                            }
                        } elseif($user->level_id == 6) {
                            if ($pesan_detail->status == '1') {
                                $amount = 1 * $pesan_detail->harga-$pesan_detail->harga*$pesan_detail->promo_gold/100;
                            } else {
                                $amount = 1 * $pesan_detail->harga;
                            }
                        }

                        @endphp
                        <tr>
                            {{-- <td>{{ $no+1 }}</td> --}}
                            <td>
                                <input type="checkbox" name="status_checked[]" class="form-control check_produk">
                                <input type="hidden" name="product_id[]" value="{{ $pesan_detail->produk_id }}">
                                <input type="hidden" name="product_flag[]" value="" class="product-flag">
                            </td>
                            <td>
                                <img src="{{ asset('produk/' . $pesan_detail->foto_produk )}}" alt="" width="100">
                            </td>
                            <td>{{ $pesan_detail->nama_produk }}</td>
                            <td width="100px;">

                                <input type="hidden" name="id_produk[]" value="{{ $pesan_detail->produk_id }}">
                                <input type="number" name="jumlah_pesan[]" min="1" placeholder="1" class="form-control jumlah" value="1" readonly>

                            </td>


                            @if ($user->level_id == 4)
                                @if ($pesan_detail->status == '1')
                                    {{-- <td id="harga" name="harga">Rp. {{ number_format($pesan_detail->harga-$pesan_detail->harga*$pesan_detail->promo/100,0,',','.') }}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="hidden" name="promo" value="promo_bronze">
                                            <input type="number" name="harga[]" min="1" placeholder="1" class="form-control harga" value="{{ $pesan_detail->harga-$pesan_detail->harga*$pesan_detail->promo_bronze/100 }}" readonly>
                                        </div>
                                    </td>
                                @else
                                    {{-- <td name="harga">Rp. {{number_format($pesan_detail->harga,0,',','.')}}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="hidden" name="promo" value="promo_silver">
                                            <input type="number" name="harga[]" min="1" placeholder="1" class="form-control harga" value="{{ $pesan_detail->harga }}" readonly>
                                        </div>
                                    </td>
                                @endif
                            @elseif($user->level_id == 5)
                                @if ($pesan_detail->status == '1')
                                    {{-- <td id="harga" name="harga">Rp. {{ number_format($pesan_detail->harga-$pesan_detail->harga*$pesan_detail->promo/100,0,',','.') }}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="hidden" name="promo" value="promo_gold">
                                            <input type="number" name="harga[]" min="1" placeholder="1" class="form-control harga" id="rupiah" value="{{ $pesan_detail->harga-$pesan_detail->harga*$pesan_detail->promo_silver/100 }}" readonly>
                                        </div>
                                    </td>
                                @else
                                    {{-- <td name="harga">Rp. {{number_format($pesan_detail->harga,0,',','.')}}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" name="harga[]" min="1" placeholder="1" class="form-control harga" value="{{ $pesan_detail->harga }}" id="rupiah" readonly>
                                        </div>
                                    </td>
                                @endif
                            @elseif($user->level_id == 6)
                                @if ($pesan_detail->status == '1')
                                {{-- <td id="harga" name="harga">Rp. {{ number_format($pesan_detail->harga-$pesan_detail->harga*$pesan_detail->promo/100,0,',','.') }}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" name="harga[]" min="1" placeholder="1" class="form-control harga" value="{{ $pesan_detail->harga-$pesan_detail->harga*$pesan_detail->promo_gold/100 }}" id="rupiah" readonly>
                                        </div>
                                    </td>
                                @else
                                    {{-- <td name="harga">Rp. {{number_format($pesan_detail->harga,0,',','.')}}</td> --}}
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" name="harga[]" min="1" placeholder="1" class="form-control harga" value="{{ $pesan_detail->harga }}" readonly>
                                        </div>
                                    </td>
                                @endif
                            @endif

                            {{-- <td><input type="text" name="hasil[]-{{ $pesan_detail->produk_id }}" id="hasil{{ $pesan_detail->id }}" class="form-control hasil" value="{{ $pesan_detail->harga }}"></td> --}}
                            @if ($pesan_detail->status == '1')
                                {{-- <td id="harga" name="harga">Rp. {{ number_format($pesan_detail->harga-$pesan_detail->harga*$pesan_detail->promo/100,0,',','.') }}</td> --}}
                                <td>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" name="hasil[{{ $pesan_detail->id }}]" class="form-control hasil" value="{{ $amount }}" readonly>
                                    </div>
                                </td>
                            @else
                                {{-- <td name="harga">Rp. {{number_format($pesan_detail->harga,0,',','.')}}</td> --}}
                                <td>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" name="hasil[{{ $pesan_detail->id }}]" class="form-control hasil" value="{{ $amount }}" readonly>
                                    </div>
                                </td>
                            @endif
                            <td>
                                <a href="{{ url('hapus-keranjang') }}/{{$pesan_detail->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Di Haapus')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @php
                            $totalHarga += $amount;
                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="5" align="right" style="font-weight: bold;">Total Harga</td>
                            <td>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    {{-- <input type="text" class="form-control" > --}}
                                    <input type="text" name="total_harga" class="form-control total_harga" value="0" readonly>
                                </div>
                            </td>
                            <td >
                                <button type="submit" class="btn" id="pesan" style="background:rgb(255, 89, 29);color:white;font-weight:bold;" >Pesan</button>
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
            jmlPembelian();

        });
    });

    // $(document).on('keyup', '.jumlah', function(e){
    $(document).on('change', '.jumlah', function(e){
        e.preventDefault();
        let El = $(this).parent().parent();
        calculationPrice(El);
        jmlPembelian();
    });

    function calculationPrice(El)
    {

        let qty = $(El.find('.jumlah')).val();
        let price = $(El.find('.harga')).val();
        let amount = qty * price;
        $(El.find('.hasil')).val(amount);
    }

    function jmlPembelian()
    {
        let Element = $('#keranjangTable');
        var subTotal = 0;
        for(let i = 0; i < $(Element.find('.check_produk')).length; i++)
        {
            let statusChecked = $(Element.find('tr')).eq(i).find('.check_produk');

            if($(statusChecked).prop("checked")){
                let Amount = $(Element.find('tr')).eq(i).find('.hasil').val();
                console.log(Amount);
                subTotal = parseFloat(subTotal) + parseFloat(Amount);
            }
            $('.total_harga').val(subTotal);
        }
    }
</script>
@endsection

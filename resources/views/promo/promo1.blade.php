@extends('template.app')

@section('title','Belanja')

@section('navbar')
<form action="{{ url('search') }}" id="fom">
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search.." name="search" id="search">
    <div class="input-group-append">
      <button class="btn btn-warning" type="submit">Search</button>
    </div>
  </div>
</form>
@endsection

@section('content')
<div class="container">
  <div class="row">
    @foreach ($promo as $item)
    <div class="card" style="width: 16rem;margin:10px;">
      <div class="card-body">
        <a href="{{ url('pesan/' . $item->id) }}" style="text-decoration: none;">
            <img class="card-img-top" src="{{ url('produk')}}/{{ $item->foto_produk }}" alt="Card image cap">  
            <strong style="color:black;font-size:14px;">{{ $item->nama_produk }}</strong>
        </a>
        <hr>
        {{-- <small>{{ $item->status }}</small><br> --}}
        @if (!empty($item->promo))
        <small>{{ $item->promo }}</small>
            <small>Harga : <s>Rp. {{ number_format($item->harga,0,',','.')  }}</s></small><br>
            <small>Diskon : </small> <strong style="color:rgb(255, 89, 29);"> Rp. {{ number_format($item->harga-$item->harga*$item->promo/100,0,',','.')  }}</strong>
            {{-- <small>{{ number_format($item->harga-$item->harga*$item->promo/100,0,',','.') }}</small> --}}
        @else
        <strong>Harga : Rp. {{ number_format($item->harga,0,',','.')  }}</strong><br>
        @endif
      </div>
    </div>
    @endforeach   
  </div>
</div>
@endsection
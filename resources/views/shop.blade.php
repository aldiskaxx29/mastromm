@extends('template.app')

@section('title','Belanja')

@section('navbar')
<form action="{{ url('search') }}" id="fom">
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Masukan nama aki.." name="search" id="search">
    <div class="input-group-append">
      <button class="btn btn-warning" type="submit">Search</button>
    </div>
  </div>
</form>
@endsection

@section('content')
<div class="container">
  <div class="row mb-2">
    @foreach ($data as $item)
    <div class="card" style="width: 16rem;margin:10px;">
      <div class="card-body">
        <a href="{{ url('pesan/' . $item->id) }}" style="text-decoration: none;">
            <img class="card-img-top" src="{{ url('produk')}}/{{ $item->foto_produk }}" alt="Card image cap">  
            <strong style="color:black;font-size:14px;">{{ $item->nama_produk }}</strong>
          </a>
      </div>
    </div>
    @endforeach   
  </div>
  {{ $data->links() }}
</div>
@endsection
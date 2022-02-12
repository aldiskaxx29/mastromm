@extends('template.app')

@section('title','Search')

@section('navbar')
{{-- <form class="form-inline mr-auto" id="fom">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
    <div class="search-element">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="search">
      <button class="btn" type="submit"><i class="fas fa-search"></i></button>
    </div>
</form> --}}
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

  <div class="row">

    @if ($data->count() == 0)
      {{-- @php
          Alert::success('error', 'Data Tidak Di Temukan');
          return view('dashboard');
      @endphp --}}
        <script>
          alert('Data Tidak Di Temukan');
          window.location.href = '/dashboard';
        </script>
    @else
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
    @endif
    
  </div>
</div>
@endsection
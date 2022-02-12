@extends('template.app')

@section('title','Dashboard')

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
    <style>
      .kotak{
        width: 100px;
        height:100px;
        background:rgb(216, 215, 214);
        border-radius:50%;
        margin:10px;"
      }
      .kotak small{
        margin-left:-70px;
        position:absolute;
        margin-top:100px;
      }
      .kotak a{
        text-decoration: none;
        color:black;
      }
      .kotak img {
        transition: transform .2s; /* Animation */
      }

      .kotak img:hover {
        transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
      }
    </style>

    {{-- slider --}}
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @foreach ($promo as $item)
        @if ($item->foto_promo == 'promo1.png')
          <div class="carousel-item active">    
        @else
          <div class="carousel-item">  
        @endif
        {{-- <div class="carousel-item active"> --}}
          <a href="{{ url('potonganPromo') }}/{{ $item->id }}">
            <img class="d-block " src="{{ url('promo') }}/{{ $item->foto_promo }}" alt="First slide" width="100%" style="margin-left: auto;margin-right:auto;">
          </a>
        </div>
        @endforeach
      </div>
    </div>

    {{-- kategori --}}
    <h2 class="text-center" style="margin-top:35px;z-index:2;">KATEGORI PRODUK</h2>
    <hr>
    {{-- <small>isi</small> --}}
    <div class="row justify-content-center">
      {{-- @foreach ($kategori as $item) --}}
        {{-- <div class="col-md-3">
          <img src="{{ url('kategori') }}/{{ $item->foto_kategori }}" alt="" class="rounded-circle">
        </div> --}}
        {{-- <div class="card" style="width:10rem;" style="border-radius: 50%;"> --}}
          {{-- <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div> --}}
          {{-- </div> --}}
          {{-- <div class="kotak">
            <a href="{{ url('kategoriProduk') }}/{{ $item->id }}">
              <img src="{{ url('kategori') }}/{{ $item->foto_kategori }}" alt="" width="80px;" style="margin-left:10px;margin-top:20px;">
              <small>{{ $item->kategori }}</small>
            </a>
            </div> --}}
            
      {{-- @endforeach --}}

      
      {{-- <div class="col-md-3"></div> --}}
    </div>
    <div class="row justify-content-center">
      @foreach ($kategori as $item)
      <div class="col-md-3 text-center">
        <a href="{{ url('kategoriProduk') }}/{{ $item->id }}" style="text-decoration: none;color:black;">
          <img src="{{ url('kategori') }}/{{ $item->foto_kategori }}" alt="" width="100%;"><br>
          <strong>{{ $item->kategori }}</strong>
        </a>
      </div>
      @endforeach
    </div>


  <h2 class="text-center" style="margin-top:50px;">PRODUK BARU</h2><hr>
  <div class="card mt-3">
    <div class="col mt-2">
        <strong style="float:left;">Produk Lain</strong>
        <a href="{{ url('shop') }}"><strong class="text-warning" style="float:right;">Lihat Semua</strong></a>
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
                    {{-- <div class="card-body">
                      <h5 class="card-title">{{ $item->nama_produk }}</h5>
                      <p class="card-text">
                        <strong>Harga : </strong> Rp. {{ $item->harga }} <br>
                        <strong>Stok : </strong> {{ $item->stok }} <hr>
                        <strong>Keterangan : </strong> <br>
                        {{ $item->keterangan }}
                      </p>
                      <a href="{{ url('pesan/' . $item->id) }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
                    </div> --}}
                </div>
            </div>
            @endforeach
          </div>
    </div>
</div>

  {{-- <h2 class="text-center" style="margin-top:50px;">Poduk Terbaru</h2>
  <hr width="50%">
  <div class="row">
    <div class="col-md-3">
      <div class="card" style="width: 17rem;">
        <img class="card-img-top" src="{{ url('produk/new/6DZF 20.jpg') }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card" style="width: 17rem;">
        <img class="card-img-top" src="{{ url('produk/new/6DZF 20.jpg') }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card" style="width: 17rem;">
        <img class="card-img-top" src="{{ url('produk/new/6DZF 20.jpg') }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card" style="width: 17rem;">
        <img class="card-img-top" src="{{ url('produk/new/6DZF 20.jpg') }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div> --}}
</div>
@endsection
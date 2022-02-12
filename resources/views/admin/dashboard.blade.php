@extends('template_admin/app')

@section('title','Dashboard')

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@yield('title')</h1>
      </div>

      <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>User</h4>
                  </div>
                  <div class="card-body">
                    @php
                        $user = DB::table('users')->count();
                        echo $user;
                    @endphp
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-store"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Produk</h4>
                  </div>
                  <div class="card-body">
                    @php
                        $produk = DB::table('produk')->count();
                        echo $produk;
                    @endphp
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-shopping-basket"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Kategori</h4>
                  </div>
                  <div class="card-body">
                    @php
                        $kategori = DB::table('kategori')->count();
                        echo $kategori;
                    @endphp
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-book-open"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Merek</h4>
                  </div>
                  <div class="card-body">
                    @php
                        $merek = DB::table('merek')->count();
                        echo $merek;
                    @endphp
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="fas fa-gifts"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Promo</h4>
                  </div>
                  <div class="card-body">
                    @php
                        $promo = DB::table('promo')->count();
                        echo $promo;
                    @endphp
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon" style="background: salmon;">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transaksi</h4>
                  </div>
                  <div class="card-body">
                    @php
                        $pesanan = DB::table('detail_transaksi')->count();
                        echo $pesanan;
                    @endphp
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
</div>

@endsection
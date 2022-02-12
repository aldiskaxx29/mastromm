@extends('template_admin/app')

@section('title','Data Laporan')

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@yield('title')</h1>
      </div>

      <div class="section-body">
        <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-5">
                  <form action="{{ url('filterLaporan')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="">Tanggal Dari</label>
                      <input type="date" name="dari" id="" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Tanggal Sampai</label>
                      <input type="date" name="sampai" id="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning" target="_blank">Search</button>
                  </form>
                </div>
              </div>
            </div>
        </div>

       
      </div>
    </section>
</div>

@endsection
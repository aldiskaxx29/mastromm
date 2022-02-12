@extends('template_admin/app')

@section('title','Data Kategori')

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@yield('title')</h1>
      </div>

      <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                      @if (session('message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button></div>
                      @endif
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</a>
                        <hr>
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Foto Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $no => $item)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td><img src="{{ asset('kategori/'.$item->foto_kategori) }}" alt="" width="100px"></td>
                                        <td>
                                          <form action="{{ url('hapus_kategori/' . $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group">
                                              <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-trash"></i></button>
                                              <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalubah{{$item->id}}"><i class="fas fa-edit"></i></a>
                                            </div>
                                          </form>
                                            {{-- <a href="{{ url('hapus_kategori/' . $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin di hapus')"><i class="fas fa-trash"></i></a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> --}}
  
  <!-- Modal Tambah-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal Tambah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('tambah_kategori') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="text" name="kategori" class="form-control">
                    @error('kategori')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Foto Kategori</label>
                    <input type="file" name="foto_kategori" class="form-control">
                    @error('foto_kategori')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="float-right">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-warning">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit-->
  @foreach ($kategori as $item)
  <div class="modal fade" id="exampleModalubah{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal Ubah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('ubah_kategori/'.$item->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Kategori</label>
                    {{-- <input type="hidden" name="id" id="" value="{{ $item->id }}"> --}}
                    <input type="text" name="kategori" class="form-control" value="{{ $item->kategori }}">
                    @error('kategori')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Foto Kategori</label><br>
                    <img src="{{ asset('kategori/'.$item->foto_kategori) }}" alt="" width="80px">
                    <input type="file" name="foto_kategori" class="form-control">
                    <small class="text-info">Biarkan jika tidak ingin diubah</small>
                    @error('foto_kategori')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="float-right">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-warning">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach


@endsection
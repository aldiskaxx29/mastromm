@extends('template_admin/app')

@section('title','Data Promo')

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
                                  <th>Promo</th>
                                  <th>Foto Promo</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($promo as $no => $item)
                                  <tr>
                                      <td>{{ $no+1 }}</td>
                                      <td>{{ $item->promo }}</td>
                                      <td><img src="{{ asset('promo/'.$item->foto_promo) }}" alt="" width="100px"></td>
                                      <td>
                                        @if ($item->status == 1)
                                            <small>Aktif</small>
                                        @else
                                            <small>Tidak Aktif</small>
                                        @endif
                                      </td>
                                      <td>
                                        <form action="{{ url('hapus_promo') }}/{{ $item->id }}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fas fa-trash"></i></button>
                                          <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalubah{{$item->id}}"><i class="fas fa-edit"></i></a>
                                        </form>
                                          {{-- <a href="{{ url('hapus_promo/' . $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Di Hapus')"><i class="fas fa-trash"></i></a> --}}
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
            <form action="{{ url('tambah_promo') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Promo</label>
                    <input type="text" name="promo" class="form-control">
                    @error('promo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Foto Promo</label>
                    <input type="file" name="foto_promo" class="form-control">
                    @error('foto_promo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select name="status" id="" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                  </select>
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


  {{-- Modal Upadte --}}
  @foreach ($promo as $item)
  <div class="modal fade" id="exampleModalubah{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal Ubah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('ubah_promo/'.$item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Promo</label>
                    <input type="text" name="promo" class="form-control" value="{{$item->promo}}">
                    @error('promo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="">Foto Promo</label><br>
                  <img src="{{asset('promo/'.$item->foto_promo)}}" alt="" width="50">
                  <input type="file" name="foto_promo" class="form-control">
                  @error('promo')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>
              <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                  {{-- @foreach ($status as $s) --}}
                    @if ($item->status == 1)
                      <option value="1" selected>Aktif</option>
                      <option value="0">Tidak Aktif</option>
                    @else
                    <option value="1" >Aktif</option>
                    <option value="0" selected>Tidak Aktif</option>
                    @endif
                  {{-- @endforeach --}}
                </select>
                @error('promo')
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
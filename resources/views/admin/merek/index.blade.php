@extends('template_admin/app')

@section('title','Data Merek')

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
                                  <th>Merek</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($merek as $no => $item)
                                  <tr>
                                      <td>{{ $no+1 }}</td>
                                      <td>{{ $item->merek }}</td>
                                      <td>
                                        <form action="{{ url('hapus_merek') }}/{{ $item->id }}" method="post">
                                          @csrf
                                          {{ method_field('DELETE') }}
                                          <div class="form-group">
                                            <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fas fa-trash"></i></button>
                                            <a href="#" class="btn btn-info btn-sm " data-toggle="modal" data-target="#exampleModalubah{{$item->id}}"><i class="fas fa-edit"></i></a>
                                          </div>
                                        </form>
                                        {{-- <a href="{{ url('hapus_merek') }}/{{ $item->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin di hapus')"><i class="fas fa-trash"></i></a> --}}
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
            <form action="{{ url('tambah_merek') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="">merek</label>
                    <input type="text" name="merek" class="form-control">
                    @error('merek')
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


  <!-- Modal Ubah-->
  @foreach ($merek as $item)
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
            <form action="{{ url('ubah_merek/'.$item->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Merek</label>
                    <input type="text" name="merek" class="form-control" value="{{$item->merek}}">
                    @error('merek')
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
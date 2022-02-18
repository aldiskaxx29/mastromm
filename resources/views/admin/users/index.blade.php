@extends('template_admin/app')

@section('title','Data Users')

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
                                  <th>Nama</th>
                                  <th>Level</th>
                                  <th>Username</th>
                                  <th>Email</th>
                                  <th>No Telepon</th>
                                  <th>Alamat</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($user as $no => $item)
                                  <tr>
                                      <td>{{ $no+1 }}</td>
                                      <td>{{ $item->nama }}</td>
                                      <td>
                                        @if ($item->level_id == 1)
                                        <span class="badge badge-light font-weight-bold">Master</span>
                                        @elseif($item->level_id == 2)
                                        <span class="badge badge-light font-weight-bold">Supervisor</span>
                                        @elseif($item->level_id == 3)
                                        <span class="badge badge-light font-weight-bold">Admin</span>
                                        @elseif($item->level_id == 4)
                                        <span class="badge badge-light font-weight-bold" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModalRole{{$item->id}}">Broze</span>
                                        @elseif($item->level_id == 5)
                                        <span class="badge badge-light font-weight-bold" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModalRole{{$item->id}}">Silver</span>
                                        @elseif($item->level_id == 6)
                                          <span class="badge badge-light font-weight-bold" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModalRole{{$item->id}}">Gold</span>
                                        @endif
                                      </td>
                                      <td>{{ $item->username }}</td>
                                      <td>{{ $item->email}}</td>
                                      <td>{{ $item->no_telepon }}</td>
                                      <td>{{ $item->alamat }}</td>
                                      <td>
                                        @if ($item->status == '1')
                                          <small class="badge badge-success" style="cursor:pointer;"  data-toggle="modal" data-target="#exampleModalStatus{{$item->id}}">Aktif</small>
                                        @else
                                          <small class="badge badge-danger" style="cursor:pointer;"  data-toggle="modal" data-target="#exampleModalStatus{{$item->id}}">Tidak Aktif</small>
                                        @endif
                                      </td>
                                      <td width="200">
                                        <form action="{{ url('hapus_user/' . $item->id) }}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <div class="form-group">
                                            <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fas fa-trash"></i></button>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalUbah{{$item->id}}"><i class="fas fa-edit"></i></a>
                                            <a href="{{ url('user-detail')}}/{{ $item->id }}" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                                          </div>
                                        </form>
                                          {{-- <a href="{{ url('hapus_user/' . $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Di Hapus')"><i class="fas fa-trash"></i></a> --}}
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
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('tambah_user') }}" class="mb-2" method="post">
                @csrf
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <select name="level" id="" class="form-control">
                            <option value="">-- Pilihan --</option>
                            @foreach ($level as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_level }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fa fa-users"></i>
                          </div>
                        </div>
                    </div>
                    @error('level')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fa fa-user"></i>
                          </div>
                        </div>
                    </div>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                    </div>
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="far fa-envelope"></i>
                          </div>
                        </div>
                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ old('alamat') }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fas fa-map-marker-alt"></i>
                          </div>
                        </div>
                    </div>
                    @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <input type="text" class="form-control" placeholder="Nomor Handphon" name="no_hp" value="{{ old('no_hp') }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fab fa-whatsapp"></i>
                          </div>
                        </div>
                    </div>
                    @error('no_hp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fa fa-lock"></i>
                          </div>
                        </div>
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-warning btn-block">Save</button>
            </form> 
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Ubah-->
  @foreach ($user as $u)
  <div class="modal fade" id="exampleModalUbah{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('ubah_user') }}/{{ $u->id }}" class="mb-2" method="post">
                @csrf
                  {{-- <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <select name="level" id="" class="form-control">
                            @foreach ($level as $item)
                              @if ($item->id == $u->level_id)
                                <option value="{{ $item->id }}" selected>{{ $item->nama_level }}</option>
                              @else
                                <option value="{{ $item->id }}">{{ $item->nama_level }}</option>
                              @endif
                            @endforeach
                        </select>
                        <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fa fa-users"></i>
                          </div>
                        </div>
                    </div>
                    @error('level')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div> --}}
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="{{ $u->nama }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fa fa-user"></i>
                          </div>
                        </div>
                    </div>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $u->username }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                    </div>
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $u->email }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="far fa-envelope"></i>
                          </div>
                        </div>
                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ $u->alamat }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fas fa-map-marker-alt"></i>
                          </div>
                        </div>
                    </div>
                    @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                      <div class="input-group colorpickerinput">
                        <input type="text" class="form-control" placeholder="Nomor Handphon" name="no_telepon" value="{{ $u->no_telepon }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="fab fa-whatsapp"></i>
                          </div>
                        </div>
                    </div>
                    @error('no_telepon')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-warning btn-block">Save</button>
            </form> 
        </div>
      </div>
    </div>
  </div>      
  @endforeach

    <!-- Modal Status-->
    @foreach ($user as $u)
    <div class="modal fade" id="exampleModalStatus{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="{{ url('ubah_status') }}/{{ $u->id }}" class="mb-2" method="post">
                  @csrf
                    <div class="form-group">
                        <div class="input-group colorpickerinput">
                          <select name="status" id="" class="form-control">
                              {{-- @foreach ($status as $item) --}}
                                @if ($u->status == '1')
                                  <option value="1" selected>Aktif</option>
                                  <option value="0">Tidak Aktif</option>
                                @else
                                  <option value="1">Aktif</option>
                                  <option value="0" selected>Tidak Aktif</option>
                                @endif
                              {{-- @endforeach --}}
                          </select>
                          <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-user"></i>
                            </div>
                          </div>
                      </div>
                      @error('status')
                          <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-warning btn-block">Simpan</button>
              </form> 
          </div>
        </div>
      </div>
    </div>      
    @endforeach

    <!-- Modal Role -->
    @foreach ($user as $u)
    <div class="modal fade" id="exampleModalRole{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="{{ url('ubah_role') }}/{{ $u->id }}" class="mb-2" method="post">
                  @csrf
                    <div class="form-group">
                        <div class="input-group colorpickerinput">
                          <select name="level" id="" class="form-control">
                              {{-- @foreach ($status as $item) --}}
                                
                                <option value="1">Master</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Admin</option>
                                <option value="4">Bronze</option>
                                <option value="5">Silver</option>
                                <option value="6">Gold</option>
                                
                                
                              {{-- @endforeach --}}
                          </select>
                          <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-user"></i>
                            </div>
                          </div>
                      </div>
                      @error('level')
                          <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-warning btn-block">Simpan</button>
              </form> 
          </div>
        </div>
      </div>
    </div>      
    @endforeach


@endsection
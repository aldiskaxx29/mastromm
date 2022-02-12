@extends('auth.app')

@section('title','Lupa Password')
    
@section('content')
    <div class="row">
        <div class="col-md-6">
            {{-- <h1>Maxtrom</h1> --}}
            <img src="../sip.png" alt="">
        </div>
        <div class="col-md-6" style="overflow-x: auto;background:rgb(28, 23, 14);">
            {{-- <p class="text-center mt-2">Silahkan Login Terlebih Dahulu</p> --}}
            <div class="col">
                <h4 class="text-center font-weight-bold mb-3 text-white">Lupa Password</h4>
                @if (session('lupa'))
                  <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>×</span>
                      </button>
                      {{ session('lupa') }}
                    </div>
                  </div>
                @endif
                <form action="{{ url('password_baru') }}" method="post">
                  @csrf
                    <div class="form-group">
                        <div class="input-group colorpickerinput">
                          <input type="text" class="form-control" placeholder="Username" name="username">
                          <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-user"></i>
                            </div>
                          </div>
                        </div>
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group colorpickerinput">
                          <input type="password" class="form-control" placeholder="Password Baru" name="password1" id="inputPassword">
                          <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </div>
                          </div>
                        </div>
                        <div class="input-group-prepend">
                            <input type="checkbox" id="showhide" class="d-none">
                        </div>
                        <label class="form-check-label" for="showhide" style="cursor:pointer;font-size:12px;color:white;"><i class="fa fa-eye"></i> Lihat password</label><br>
                        @error('password1')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group colorpickerinput">
                          <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password2" id="inputPassword1">
                          <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </div>
                          </div>
                        </div>
                        <div class="input-group-prepend">
                            <input type="checkbox" id="showhide1" class="d-none">
                        </div>
                        <label class="form-check-label" for="showhide1" style="cursor:pointer;font-size:12px;color:white;"><i class="fa fa-eye"></i> Lihat password</label><br>
                        @error('password2')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-block" style="background: #FC762A;color:white;font-weight:bold;">Konfirmasi</button>
                </form> 
                <small class="text-white">Sudah Memiliki Akun</small><a href="{{ url('/login') }}" style="color: #FC762A;"><strong> Back</a></strong>
            </div>
        </div>
    </div>
@endsection
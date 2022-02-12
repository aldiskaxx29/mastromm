@extends('auth.app')

@section('title','Login')
    
@section('content')
    <div class="row">
        <div class="col-md-6">
            <img src="../sip.png" alt="">
        </div>
        <div class="col-md-6 " style="overflow-x: auto;background:rgb(28, 23, 14);">
            <p class="text-center mt-3 font-weight-bold text-white">Silahkan Login Terlebih Dahulu</p>
            <div class="col">
                <h2 class="text-center font-weight-bold mb-3 text-white">MAXSTROM</h2>
                @if (session('login'))
                  <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>×</span>
                      </button>
                      {{ session('login') }}
                    </div>
                  </div>
                @elseif (session('regist'))
                  <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>×</span>
                      </button>
                      {{ session('regist') }}
                    </div>
                  </div>
                @endif
                <form action="{{ route('login_user') }}" method="post">
                  @csrf
                    <div class="form-group">
                        <div class="input-group colorpickerinput">
                          <input type="text" class="form-control" name="username" placeholder="Masukan Username" autofocus>
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
                          <input type="password" class="form-control" name="password" placeholder="Masukan Password" id="inputPassword">
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
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-block" style="background: #FC762A;color:white;font-weight:bold;">Masuk</button>
                </form> 
                <div class="mt-2">
                  <small class="text-white">Belum Memiliki Akun</small><a href="{{ route('regist') }}" style="color: #FC762A;"><strong> Daftar</a></strong>
                  <a href="{{ url('lupa_password') }}" style="color:#FC762A;"><small style="float: right;color:#FC762A;font-weight:bold;">Lupa Password</small></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('auth.app')

@section('title','Registrasi')
  
@section('content')
    <div class="row">
        <div class="col-md-6">
            {{-- <h1>Maxtrom</h1> --}}
            <img src="../sip.png" alt="">
        </div>
        <div class="col-md-6" style="overflow-x: auto;background:rgb(28, 23, 14);">
        {{-- <div class="col-md-6" style="overflow-x: auto;"> --}}
            {{-- <p class="text-center mt-2"></p> --}}
            <div class="col">
                <h2 class="text-center font-weight-bold mb-4 text-white">Silahkan Daftar Akun</h2>
                <form action="{{ route('registrasi') }}" class="mb-2" method="post">
                  @csrf
                    <div class="form-group">
                        <div class="input-group colorpickerinput">
                          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}" required>
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
                        <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required>
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
                          <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
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
                          <input type="text" class="form-control" placeholder="Toko" name="toko" value="{{ old('toko') }}"  required>
                          <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-store"></i>
                            </div>
                          </div>
                        </div>
                        @error('toko')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group colorpickerinput">
                          <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ old('alamat') }}" required>
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
                          <input type="text" class="form-control" placeholder="Nomor Handphon" name="no_telepon" value="{{ old('no_telepon') }}" required>
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
                    <div class="form-group">
                        <div class="input-group colorpickerinput">
                          <input type="password" class="form-control" placeholder="Password" name="password" id="inputPassword" required>
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
                    <div class="form-group row">
                      {{-- <div class="col-md-4"></div> --}}
                      <div class="col-md-6">
                          {{-- {!! NoCaptcha::renderJs('fr', true, 'recaptchaCallback') !!} --}}
                          {!! NoCaptcha::display() !!}
                          {!! NoCaptcha::renderJs() !!}
                          @error('g-recaptcha-response')
                          {{-- <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                          </span> --}}
                          <small class="text-danger">{{ $message }}</small>
                          @enderror
                      </div>
                  </div>
                    <button type="submit" class="btn btn-block" style="background: #FC762A;color:white;font-weight:bold;">Daftar</button>
                </form> 
                <small class="text-white">Sudah Memiliki Akun</small><a href="{{ url('/login') }}" style="color: #FC762A;"><strong> Masuk</a></strong>
            </div>
        </div>
    </div>
@endsection
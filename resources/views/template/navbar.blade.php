{{-- <div class="container"> --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('dashboard') }}"><img src="../Maxstrom.png" alt="" width="150px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <p >Aldo</p> --}}
        {{-- @include('template.title') --}}
        @yield('navbar')
        <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav ml-auto float-right">
            <!-- Authentication Links -->
            <li class="nav-item" style="margin-top:10px;margin-right:20px;">
                @php
                    $keranjang = DB::table('keranjang')
                    ->where('users_id', Auth::user()->id)->count()
                @endphp
                @if (empty($keranjang))
                    <a href="#" style="color:black;"><i class="fa fa-shopping-cart" style="font-size: 20px;"></i></a>    
                @else
                    <a href="{{ url('keranjang') }}" style="color:black;"><i class="fa fa-shopping-cart" style="font-size: 20px;"></i></a>
                        {{-- @if (!empty($notif)) --}}
                            <small style="color:black;margin-top:-5px;position:absolute;padding-left:4px;padding-right:4px;background:orange;border-radius:50%;margin-left:-9px;font-size:11px;">
                                @php
                                    
                                    echo $keranjang;
                                @endphp
                            </small>
                        {{-- @endif --}}
                @endif

            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ url('profil') }}/{{ Auth::user()->foto_user }}" class="rounded-circle mr-1" width="30">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->nama }}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ url('profile') }}" class="dropdown-item has-icon">
                    <i class="fas fa-user"></i> Profile
                </a>
                <a href="{{ url('riwayat_transaksi') }}" class="dropdown-item has-icon">
                    <i class="fas fa-shopping-cart"></i> Riwayat Transaksi
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                </div>
            </li>
            
        </ul>
        </div>
    </nav>
{{-- </div> --}}
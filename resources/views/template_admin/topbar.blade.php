<nav class="navbar navbar-expand-lg main-navbar bg-warning">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
      <div class="search-element">
        <h3 style="margin-top:5px;color:white;">Dashboard Admin</h3>
      </div>
    </form>
  
    <ul class="navbar-nav navbar-right">
      <li class="dropdown dropdown-list-toggle">
        <a href="{{ url('users') }}" class="nav-link nav-link-lg ">
          <i class="far fa-user"></i>
          {{-- <small style="color:black;margin-top:-5px;position:absolute;padding-left:4px;padding-right:4px;background:yellow;border-radius:50%;margin-left:-9px;font-size:11px;">
            @php
                $users = DB::table('users')->where('status', 'Tidak Aktif')->count();
                echo $users;
            @endphp
          </small> --}}
          <small style="background: gold;padding-left:5px;padding-right:5px;border-radius:50%;">  
            @php
                $user = DB::table('users')->where('status', 'Tidak Aktif')->count();
                echo $user;
            @endphp
          </small>
        </a>
      </li>
      <li class="dropdown dropdown-list-toggle">
        <a href="{{ url('transaksi') }}" class="nav-link nav-link-lg ">
          <i class="far fa-bell"></i><small style="background: gold;padding-left:5px;padding-right:5px;border-radius:50%;">
            @php
                $pesanan = DB::table('transaksi')
                // ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi_id')
                // ->select('transaksi.status')
                ->where('status', '0')
                ->count();
                echo $pesanan;
            @endphp
          </small>
        </a>
      </li>
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->nama }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Logged in 5 min ago</div>
          <a href="{{ url('profil_user') }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
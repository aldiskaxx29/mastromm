@extends('template_admin/app')

@section('title','Detail User')

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@yield('title')</h1>
      </div>

      <div class="section-body">
        <div class="card">
            <div class="card-body" style="overflow-x: auto;">
                <a href="{{ url('users') }}" class="btn btn-sm btn-secondary">Back</a>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('profil/' . $user->foto_user) }}" alt="" width="100%">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            {{-- @foreach ($user as $item) --}}
                            <tr>
                                <th>Nama </th>
                                <td>:</td>
                                <td>{{ $user->nama }}</td>
                            </tr>
                            <tr>
                                <th>Toko</th>
                                <td>:</td>
                                <td>{{ $user->toko }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <td>:</td>
                                <td>{{ $user->no_telepon }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $user->alamat}}</td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>:</td>
                                <td>
                                    @if ($user->level_id == 1)
                                        <small class="badge badge-light">Master</small>
                                    @elseif($user->level_id == 2)
                                        <small class="badge badge-light">Supervisor</small>
                                    @elseif($user->level_id == 3)
                                        <small class="badge badge-light">Admin</small>
                                    @elseif($user->level_id == 4)
                                        <small class="badge badge-light">Bronze</small>
                                    @elseif($user->level_id == 5)
                                        <small class="badge badge-light">Silver</small>
                                    @elseif($user->level_id == 6)
                                        <small class="badge badge-light">Gold</small> 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>
                                    @if ($user->status == 1)
                                        <small class="badge badge-success">Aktif</small>
                                    @else
                                        <small class="badge badge-danger">Tidak Aktif</small>
                                    @endif
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
      </div>
    </section>
</div>

@endsection
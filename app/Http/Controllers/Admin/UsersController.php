<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(){
        $user = User::all();
        $level = Level::all();
        // $status = ['Aktif','Tidak Aktif'];
        // dd($status);die;
        // foreach ($status as $item) {
        //     dd($item);die;
        // }
        // $level = DB::table('level')->get();
        return view('admin.users.index', compact('user','level'));
    }

    public function tambah(Request $request){
        // dd($request->all());
        // $nama = $request->nama;
        // $level = $request->level;
        // $email = $request->email;
        // $alamat = $request->alamat;
        // $no_hp = $request->no_hp;
        // $password = $request->password;

        $request->validate([
            'nama' => 'required',
            'level' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'password' => 'required|min:6'
        ]);

        // DB::table('users')->insert([
        //     'nama' => $request->nama,
        //     'level_id' => $request->level,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'alamat' => $request->alamat,
        //     'no_telepon' => $request->no_hp,
        //     'password' => bcrypt($request->password) 
        // ]);
        $dataUser = [
            'nama' => $request->nama,
            'username' => $request->username,
            'level_id' => $request->level,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_hp,
            'password' => bcrypt($request->password),
            'foto_user' => 'default.png'
        ];
        User::create($dataUser);
        return redirect('users')->with('message','Berhasil Di Tambahkan');
    }

    public function ubah(Request $request, $id){
        // dd($id);die;
        $request->validate([
            'nama' => 'required',
            // 'level_id' => 'required',
            'username' => 'required',
            'email' => 'required',
            'no_telepon' => 'required|numeric',
            'alamat' => 'required',
        ]);

        User::where('id',$id)->update([
            'nama' => $request->nama,
            // 'level_id' => $request->level,
            'username' => $request->username,
            'email' =>  $request->email,
            // 'username' => $request->username,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat
        ]);

        return redirect('users')->with('message','Berhasil Di Ubah');
    }

    public function ubahStatus(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'status' => 'required',
        ]);

        User::where('id',$id)->update([
            'status' => $request->status,
        ]);

        return redirect('users')->with('message','Status Berhasil Di Ubah');
    }

    public function ubahRole(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'level' => 'required',
        ]);

        User::where('id',$id)->update([
            'level_id' => $request->level,
        ]);

        return redirect('users')->with('message','Level Berhasil Di Ubah');
    }

    public function hapus($id){
        User::where('id', $id)->delete();
        return redirect('users')->with('message','Berhasil Di Hapus');
    }
}

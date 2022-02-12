<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class DasbordController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function profil(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin/profil', compact('user'));
    }

    public function ubahProfil(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'nama' =>'required',
            'email' => 'required|email',
            'username' => 'required',
            'no_telepon' => 'required|numeric',
            'alamat' => 'required'
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->no_telepon = $request->no_telepon;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect()->route('profil_user')->with('user','Data Berhasil Di Update');
    }
}

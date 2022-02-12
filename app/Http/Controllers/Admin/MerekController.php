<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merek;

class MerekController extends Controller
{
    public function index(){
        $merek = Merek::all();
        return view('admin.merek.index', compact('merek'));
    }

    public function tambah(Request $request){
        $request->validate([
            'merek' => 'required'
        ]);

        $merek = new Merek();
        $merek->merek = $request->merek;
        $merek->save();

        return redirect()->route('merek')->with('message','Berhasil Di Tambahkan');
    }

    public function ubah(Request $request, $id){
        $request->validate([
            'merek' => 'required',
        ]);

        Merek::where('id',$id)->update([
            'merek' => $request->merek,
        ]);

        return redirect()->route('merek')->with('message','Berhasil Di Ubah');
    }

    public function hapus($id){
        Merek::where('id',$id)->delete();
        return redirect()->route('merek')->with('message','Berhasil Di Hapus');
    }

}

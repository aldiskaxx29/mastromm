<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        // dd($kateogri);die;
        return view('admin.kategori.index', compact('kategori'));
    }

    public function tambah(Request $request){
        // dd('udah nich');die;
        $request->validate([
            'kategori' => 'required',
			'foto_kategori' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
		]);

        
        if($request->hasFile('foto_kategori')){
            $poto = $request->file('foto_kategori');
            $ext = $poto->getClientOriginalExtension();
            $potoName = $request->name . date('YdmHis'). '.' . $ext;
            $path = public_path('kategori/');
            $poto->move($path, $potoName);
        }
        else{
            $potoName = 'default.png';
        }

        // $data = $request->only('kategori');
        $dataPoto = [
            'kategori' => $request->kategori,
            'foto_kategori' => $potoName
        ];
        // $data = array_merge($only, $dataPoto);
        // dd($dataPoto);
        Kategori::create($dataPoto);

        return redirect()->route('data_kategori')->with('message','Berhasil Di Tambahkan');
    }   

    public function ubah(Request $request, $id){
        // $kategori = Kategori::where('id', $id)->first();
        // $ubah = Kategori::findorfail($id);
        // dd($ubah);
        // $awal = $ubah->foto_kategori;

        $request->validate([
            'kategori' => 'required',
            // 'foto_kategori' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $kategori = Kategori::find($id);
        
        

        $kategori->kategori       = $request->kategori;
        
        
        if($request->hasfile('foto_kategori'))
        {   
            $file = $request->file('foto_kategori');
            
            $extension = $request->foto_kategori->getClientOriginalExtension();  //Get Image Extension
            $fileName =  uniqid().'.'.$extension;  //Concatenate both to get FileName (eg: file.jpg)
            $file->move(public_path().'/kategori/', $fileName);  
            $data = $fileName; 
            $kategori->update(['foto_kategori'=>$data]);
            //hapus
            // $file =public_path('/kategori/').$kategori->foto_kategori;
            // if(file_exists($file)){
            //     @unlink($file);
            // }
            // $kategori->delete();
        }

        
        // dd($kategori);
        
        // $dt = [
        //     'kategori' => $request->kategori,
        //     'foto_kategori'=> $awal,
        // ];
        // $kategori = new Kategori;
        // $kategori->kategori = $request->kategori;
        // if($request->file('foto_kategori')){
        //     $file = $request->file('foto_kategori');
        //     $nama_file = time().str_replace(" ", "", $file->getClientOriginalName());
        //     $file->move('kategori', $nama_file);
        //     $kategori->foto_kategori = $nama_file;
        // }
        $kategori->save();


        // dd($dt);
        // $request->foto_kategori->move(public_path().'/kategori'.$awal);
        // $ubah->update($dt);

        // Kategori::where('id', $id)->update([
        //     'kategori'      => $request->kategori,
        //     'foto_kategori' => $request->file('name')
        // ]);
        return redirect()->route('data_kategori')->with('message','Berhasil Di Ubah');
    }

    // public function update(Request $req, $id){
    //     // dd($req->all());
    //     DB::table('tb_kendaraan')->where('id',$id)->update([
    //         'kode_id' => $req->kode,
    //         'plat' => $req->plat,
    //         'merk' => $req->merk,
    //         'jenis_kendaraan' => $req->jenis,
    //     ]);
    //     alert()->success('Berhasil', 'Data Berhasil Di Ubah');
    //     return redirect()->route('kendaraan')->with('message','Data Berhasil di Update');
    // }

    public function hapus($id){
        // Kategori::where('id', $id)->delete();
        // DB::table('tb_kendaraan')->where('id',$id)->delete();
        // alert()->success('Berhasil', 'Data Berhasil Di Hapus');
        $hapus = Kategori::findorfail($id);
        $file = public_path('/kategori/').$hapus->foto_kategori;
        //cek jika ada
        if(file_exists($file)){
            @unlink($file);
        }
        $hapus->delete();
        return redirect()->route('data_kategori')->with('message','Data Berhasil di Hapus');
    }
}

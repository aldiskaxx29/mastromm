<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    public function index(){
        $promo = Promo::all();
        $status = ['1','0'];
        return view('admin.promo.index', compact('promo','status'));
    }

    public function tambah(Request $request){
        $request->validate([
            'promo' => 'required',
            'foto_promo' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
            'status' => 'required'
        ]);

        if($request->hasFile('foto_promo')){
            $poto = $request->file('foto_promo');
            $ext = $poto->getClientOriginalExtension();
            $potoName = $request->name . date('YdmHis'). '.' . $ext;
            $path = public_path('promo/');
            $poto->move($path, $potoName);
        }
        else{
            $potoName = 'default.png';
        }

        // $data = $request->only('promo');
        $dataPoto = [
            'promo' => 0,
            'foto_promo' => $potoName,
            'status' => $request->status
        ];
        // $data = array_merge($only, $dataPoto);
        // dd($dataPoto);
        Promo::create($dataPoto);

        return redirect()->route('promotion')->with('message','Berhasil Di Tambahkan');
    }

    public function ubah(Request $request, $id){

        $request->validate([
            'promo' => 'required',
            // 'foto_promo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $promo = Promo::find($id);
         
        $promo->promo = $request->promo;
        $promo->status = $request->status;

        
        
        if($request->hasfile('foto_promo'))
        {   
            $file = $request->file('foto_promo');
            
            $extension = $request->foto_promo->getClientOriginalExtension();  //Get Image Extension
            $fileName =  uniqid().'.'.$extension;  //Concatenate both to get FileName (eg: file.jpg)
            $file->move(public_path().'/promo/', $fileName);  
            $data = $fileName; 
            $promo->update(['foto_promo'=>$data]);
            //hapus
            // $file =public_path('/promo/').$promo->foto_promo;
            // if(file_exists($file)){
            //     @unlink($file);
            // }
            // $promo->delete();
        }

        $promo->save();
        return redirect()->route('promotion')->with('message','Berhasil Di Ubah');
    }

    public function hapus($id){
        // Promo::where('id', $id)->delete();
        $hapus = Promo::findorfail($id);
        $file = public_path('/promo/').$hapus->foto_promo;
        //cek jika ada
        if(file_exists($file)){
            @unlink($file);
        }
        $hapus->delete();
        return redirect()->route('promotion')->with('message','Berhasil Di Hapus');
    }
}

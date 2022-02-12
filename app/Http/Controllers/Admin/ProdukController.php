<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Merek;
use App\Models\Promo;
use App\Models\DetailProduk;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(){
        $produk = Produk::all();
        $kategori = Kategori::all();
        $merek = Merek::all();
        $promo = Promo::all();
        $detail = DetailProduk::all();
        $kode = Produk::kode(); 
        // $produk = DB::table('produk')
        // ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
        // ->join('merek', 'produk.merek_id', '=', 'merek.id')
        // ->join('promo', 'produk.promo_id', '=', 'promo.id')
        // ->select('produk.nama_produk')
        // ->select('produk.*')
        // ->where('produk.id', '=', $id)
        // ->get();

        return view('admin.produk.index', compact('produk','kategori','merek','promo','detail','kode'));
    }

    public function detail($id){

        $produk = DB::table('produk')
        ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
        ->join('merek', 'produk.merek_id', '=', 'merek.id')
        ->join('promo', 'produk.promo_id', '=', 'promo.id')
        // ->select('produk.nama_produk')
        ->select('produk.*','kategori.kategori','merek.merek')
        ->where('produk.id', '=' ,$id)
        ->first();

        // var_dump($produk);die;
        // return view('admin.produk.detail', compact('produk'));
        return view('admin.produk.detail', ['produk' => $produk]);
    }

    public function tambah(Request $request){
        // dd($request->all());
        $request->validate([
            'nama_produk'   => 'required',
            'kategori'      => 'required',
            'promo'         => 'required',
            'merek'         => 'required',
            'harga'         => 'required|numeric',
            'stok'          => 'required|numeric',
            'foto_produk'   => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
            'detail'        => 'required'
        ]);

        if($request->hasFile('foto_produk')){
            $poto = $request->file('foto_produk');
            $ext = $poto->getClientOriginalExtension();
            $potoName = $request->name . date('YdmHis'). '.' . $ext;
            $path = public_path('produk/');
            $poto->move($path, $potoName);
        }
        else{
            $potoName = 'default.png';
        }
        $dataPoto = [
            'kategori_id' => $request->kategori,
            'merek_id' => $request->merek,
            'promo_id' => $request->promo,
            'detail_produk_id' => $request->detail,
            'kode_produk' => $request->kode,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'foto_produk' => $potoName,
            'stok' => $request->stok
        ];
        // $data = array_merge($only, $dataPoto);
        // dd($dataPoto);
        
        Produk::create($dataPoto);

        return redirect()->route('produk_barang')->with('message','Berhasil Di Tambahkan');
    }   

    public function ubah(Request $request, $id){
        $kategori = Kategori::all();
        $merek = Merek::all();
        $promo = Promo::all();
        $detail = DetailProduk::all();
        $produk = DB::table('produk')
        ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
        ->join('merek', 'produk.merek_id', '=', 'merek.id')
        ->join('promo', 'produk.promo_id', '=', 'promo.id')
        // ->join('detail_produk', 'produk.detail_produk_id', '=', 'detail_produk.id')
        // ->select('produk.nama_produk')
        ->select('produk.*')
        ->where('produk.id', '=' ,$id)
        ->first();

        // $produk = DB::table('produk')
        // ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
        // ->join('merek', 'produk.merek_id', '=', 'merek.id')
        // ->join('promo', 'produk.promo_id', '=', 'promo.id')
        // // ->select('produk.nama_produk')
        // ->select('produk.*','kategori.kategori','merek.merek')
        // ->where('produk.id', '=' ,$id)
        // ->first();

        // var_dump($produk);die;
        // return view('admin.produk.detail', compact('produk'));
        return view('admin.produk.ubah', compact('produk','kategori','merek','promo','detail'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'promo' => 'required',
            'detail' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            // 'foto_kategori' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $produk = Produk::find($id);
        $produk->kategori_id       = $request->kategori;
        $produk->merek_id          = $request->merek;
        $produk->promo_id          = $request->promo;
        $produk->detail_produk_id  = $request->detail;
        $produk->nama_produk       = $request->nama_produk;
        $produk->harga             = $request->harga;
        $produk->stok              = $request->stok;        
        
        if($request->hasfile('foto_produk'))
        {   
            $file = $request->file('foto_produk');
            
            $extension = $request->foto_produk->getClientOriginalExtension();  //Get Image Extension
            $fileName =  uniqid().'.'.$extension;  //Concatenate both to get FileName (eg: file.jpg)
            $file->move(public_path().'/produk/', $fileName);  
            $data = $fileName; 
            $produk->update(['foto_produk'=>$data]);
            //hapus
            // $file =public_path('/produk/').$produk->foto_produk;
            // if(file_exists($file)){
            //     @unlink($file);
            // }
            // $produk->delete();
        }
        $produk->save();
        return redirect()->route('produk_barang')->with('message','Berhasil Di Ubah');
    }

    public function hapus($id){
        $hapus = Produk::findorfail($id);
        $file = public_path('/produk/').$hapus->foto_produk;
        //cek jika ada
        if(file_exists($file)){
            @unlink($file);
        }
        $hapus->delete();
        return redirect()->route('produk_barang')->with('message','Data Berhasil di Hapus');
    }

    public function kode(){
        $produk = Produk::latest()->first() ?? new Produk();
        $all = 'PDK'. tambah_nol_didepan((int)$produk->id +1, 3);
        $request['kode_produk'] = Produk::create($request->all());
        var_dump($produk);die;
    }
}

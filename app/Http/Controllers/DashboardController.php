<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Promo;

class DashboardController extends Controller
{
    public function index(){
        // var_dump(date('Y/m/d'));die;
        // $barangs = DB::table('barangs')->get();
        $barangs = Produk::all();
        // ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
        // ->join('merek', 'produk.merek_id', '=', 'merek.id')
        // ->join('promo', 'produk.promo_id', '=', 'promo.id')
        // // ->select('produk.nama_produk')
        // ->select('produk.*')
        // ->get();
        // dd($barangs);
        $kategori = Kategori::all();
        $promo = Promo::all();
        return view('dashboard', compact('barangs','kategori','promo'));
    }

    public function pesan($id){
        $barangs = DB::table('produk')->get();
        $barang = DB::table('produk')
        ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
        ->join('merek', 'produk.merek_id', '=', 'merek.id')
        ->join('promo', 'produk.promo_id', '=', 'promo.id')
        // ->select('produk.nama_produk')
        // ->select('produk.*')
        ->where('produk.id', $id)
        // ->first();
        ->get();
        dd($barang);die;


        return view('detail', compact('barang','barangs'));
    }

    public function das(){
        return view('admin.dashboard');
    }

    public function search(){
        // $ada = request('search');
        // var_dump($ada);die;
        		// menangkap data pencarian
		$cari = request('search');
 
        // mengambil data dari table pegawai sesuai pencarian data
        $data = DB::table('produk')
        ->where('nama_produk','like',"%".$cari."%")
        ->paginate();

        // mengirim data pegawai ke view index
        // Alert::success('error', 'Data Tidak Di Temukan');
        return view('search', compact('data'));
    }

    public function kategoriProduk($id){
        // dd($id);
        $kategori = Produk::where('kategori_id', $id)->get();
        // dd($kategori);
        return view('kategori.index', compact('kategori'));
    }

    public function shop(){
        $data = DB::table('produk')->simplePaginate(10);
        return view('shop', compact('data'));
    }
}

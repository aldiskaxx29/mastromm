<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Transaksi;
use App\Models\Keranjang;
use App\Models\User;

class CS_KeranjangController extends Controller
{
    public function index(){
        // $keranjang = Keranjang::where('users_id', Auth::user()->id)
        $keranjang = Transaksi::where('users_id', Auth::user()->id)
        ->join('produk','transaksi.produk_id','=','produk.id')
        // ->select('transaksi.*','produk.nama_produk','produk.foto_produk','produk.harga')
        ->get();
        // dd($keranjang);die;
        return view('keranjang', compact('keranjang'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use App\Models\Pesanan;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use PDF;

class TransaksiController extends Controller
{
    public function index(){
        $pesan = DB::table('detail_transaksi')
        ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        ->join('produk','detail_transaksi.produk_id','=','produk.id')
        ->join('promo','produk.promo_id','=','promo.id')
        ->select('detail_transaksi.qty','detail_transaksi.id','detail_transaksi.transaksi_id','detail_transaksi.created_at','transaksi.status','transaksi.kode_transaksi','transaksi.nama_penerima','produk.nama_produk','produk.harga','detail_transaksi.qty','promo.promo') 
        ->orderBy('id','DESC')
        ->get();

        // dd($pesan);

        return view('admin.transaksi.index', compact('pesan'));
    }

    public function ubahStatus(Request $request, $id){
        // dd($request->all());
        $transaksi = DB::table('transaksi')->where('id', $id)->update([
            'status' => $request->status
        ]);
        return redirect('transaksi')->with('transaksi','Status Berhasil Di Ubah');
    }

    public function hapus($id){
        DB::table('detail_transaksi')->where('id', $id)->delete();
        return redirect('transaksi')->with('transaksi','Data Berhasil Di Hapus');
    }

    public function cetakTransaksi(){
        $tgl = date('Y/m/d');
        $data = DB::table('detail_transaksi')
        ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        ->join('produk','detail_transaksi.produk_id','=','produk.id')
        ->join('promo','produk.promo_id','promo.id')
        ->select('detail_transaksi.qty','detail_transaksi.id','detail_transaksi.transaksi_id','detail_transaksi.created_at','transaksi.status','transaksi.kode_transaksi','transaksi.nama_penerima','produk.nama_produk','produk.harga','detail_transaksi.qty','promo.promo')
        // ->where('user_id', Auth::user()->id)
        ->get();

        $transaksi = PDF::loadView('admin.transaksi.downloadTransaksi', compact('data','tgl'))->setPaper('Legal','Potrait');

        // dd($pesan);die;
        return $transaksi->download('Transaksi.pdf');
    }
}

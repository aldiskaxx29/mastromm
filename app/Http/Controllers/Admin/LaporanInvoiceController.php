<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaporanInvoiceController extends Controller
{
    public function index(){
        return view('admin.laporanInvoice.index');
    }

    public function filterLaporan(Request $request){
        $dari = $request->dari;
        $sampai = $request->sampai;

        $laporan = DB::table('detail_transaksi')
        ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        ->join('produk','detail_transaksi.produk_id','=','produk.id')
        ->join('promo','produk.promo_id','=','promo.id')
        ->whereBetween('detail_transaksi.created_at', [$dari,$sampai])
        ->select('detail_transaksi.qty','detail_transaksi.id','detail_transaksi.transaksi_id','detail_transaksi.created_at','transaksi.status','transaksi.kode_transaksi','transaksi.nama_penerima','produk.nama_produk','produk.harga','detail_transaksi.qty','promo.promo')
        ->where('transaksi.status','3')
        ->get();

        return view('admin.laporanInvoice.filterLaporan', compact('laporan','dari','sampai'));
    }

    public function cetakLaporan($dari, $sampai){
        // $dari = $request->dari;
        // $sampai = $request->sampai;
        // dd($dari,$sampai);die;

        // $laporan = DB::table('pesanans')
        // ->join('users','pesanans.user_id','=','users.id')
        // ->whereBetween('tanggal',[$dari,$sampai])
        // ->select('pesanans.*','users.nama','users.no_telepon','users.alamat')
        // ->get();

        $laporan = DB::table('detail_transaksi')
            // ->where('transaksi_id', $transaksi->id)
        ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        ->join('produk','detail_transaksi.produk_id','=','produk.id')
        ->join('promo','produk.promo_id','=','promo.id')
        ->whereBetween('detail_transaksi.created_at',[$dari,$sampai])
        ->select('detail_transaksi.qty','detail_transaksi.id','detail_transaksi.transaksi_id','detail_transaksi.created_at','transaksi.status','transaksi.kode_transaksi','transaksi.nama_penerima','produk.nama_produk','produk.harga','detail_transaksi.qty','promo.promo')
        // ->where('transaksi.users_id', Auth::user()->id)
        ->where('transaksi.status', '3')
        ->get();
        
        // var_dump($laporan);die;
        return view('admin.laporan.cetak_laporan', compact('laporan'));
        // return view('admin.laporan.cetak_laporan', compact('laporan','dari','sampai'));
    }

    public function cetak_satuan($dari, $sampai, $id){
        // $item = DB::table('pesanans')
        // ->where('pesanans.id', $id)
        // ->join('users','pesanans.user_id','=','users.id')
        // ->whereBetween('tanggal',[$dari,$sampai])
        // ->select('pesanans.*','users.nama','users.no_telepon','users.alamat')
        // ->first();

        // $item = DB::table('pesanan_details')
        // ->where('pesanans.id', $id)
        // ->join('pesanans','pesanan_details.pesanan_id','=','pesanans.id')
        // ->join('produk','pesanan_details.barang_id','=','produk.id')
        // // ->join('users', 'pesanans_details.user_id','=','users.id')
        // // ->select('pesanans.*','produk.nama_produk','produk.harga','pesanans.status','produk.foto_produk')
        // ->whereBetween('pesanan_details.created_at',[$dari,$sampai])
        // ->select('pesanans.*','produk.nama_produk','pesanan_details.jumlah','pesanan_details.kode_transaksi','pesanan_details.nama_penerima','produk.harga')
        // ->first();

        $item = DB::table('detail_transaksi')
        ->where('detail_transaksi.id', $id)
        ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        ->join('produk','detail_transaksi.produk_id','=','produk.id')
        ->join('promo','produk.promo_id','=','promo.id')
        ->whereBetween('detail_transaksi.created_at',[$dari,$sampai])
        ->select('detail_transaksi.qty','detail_transaksi.id','detail_transaksi.transaksi_id','detail_transaksi.created_at','transaksi.status','transaksi.kode_transaksi','transaksi.nama_penerima','produk.nama_produk','produk.harga','detail_transaksi.qty','promo.promo')
        // ->where('transaksi.users_id', Auth::user()->id)
        // ->where('detail_transaksi.Status', 'Menunggu Konfirmasi')
        ->first();

        // var_dump($item);die;
        return view('admin.laporan.cetak_satuan', compact('item'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Promo;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\User;

class KeranjangController extends Controller
{

    public function index(){

        // $transaksi = DB::table('detail_transaksi')
        // ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        // ->select('detail_transaksi.*','transaksi.total_produk','transaksi.total_harga','transaksi.users_id')
        // ->where('transaksi.users_id', Auth::user()->id)
        // ->where('detail_transaksi.Status', 'Menunggu Konfirmasi')
        // ->first();

        // $jml = DB::table('detail_transaksi')
        // ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        // ->select('detail_transaksi.*','transaksi.total_produk','transaksi.total_harga','transaksi.users_id')
        // ->where('transaksi.users_id', Auth::user()->id)
        // ->where('detail_transaksi.Status', 'Menunggu Konfirmasi')
        // ->sum('total_harga');
        // if(!empty($transaksi)){
        //     $keranjang = DB::table('detail_transaksi')
        //     ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        //     ->join('produk','transaksi.produk_id','=','produk.id')
        //     ->join('promo','produk.promo_id','=','promo.id')
        //     ->select('detail_transaksi.*','detail_transaksi.produk_id','transaksi.total_produk','transaksi.total_harga','transaksi.users_id','produk.foto_produk','produk.nama_produk','produk.harga','produk.promo_id','promo.promo','promo.status')
        //     ->where('transaksi.users_id', Auth::user()->id)
        //     ->where('detail_transaksi.Status', 'Menunggu Konfirmasi')
        //     ->get();


        //     $promo = Promo::where('id', $transaksi);
        //     // dd($promo);
        // }

        // if (empty($keranjang)) {
        //     return view('keranjang', compact('transaksi'));
        // } else {
        //     return view('keranjang', compact('transaksi','keranjang','jml','promo'));
        // }

        // $keranjang = Keranjang::where('users_id', Auth::user()->id)
        // ->join('produk','keranjang.produk_id','produk.id')
        // ->select('keranjang.*','produk.nama_produk','produk.harga','produk.foto_produk')
        // ->get();

        // $jml = DB::table('detail_transaksi')
        // ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        // ->where('transaksi.users_id', Auth::user()->id)
        // ->where('transaksi.status','0')
        // ->sum('sub_total');
        // dd($jml);die;
        // $keranjang = DB::table('detail_transaksi')
        // ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        // ->join('produk','detail_transaksi.produk_id','=','produk.id')
        // ->join('promo','produk.promo_id','promo.id')
        // ->select('detail_transaksi.*','produk.harga','produk.nama_produk','produk.foto_produk','promo.status','promo.promo')
        // ->where('transaksi.users_id', Auth::user()->id)
        // ->where('transaksi.status', '0')
        // ->get();

        // $jang = Keranjang::all();
        // $keranjang = Keranjang::where('users_id', Auth::user()->id)->get();
        // dd($keranjang->);die;


        $keranjang = DB::table('keranjang')
            ->join('users','keranjang.users_id','=','users.id')
            ->join('produk','keranjang.produk_id','=','produk.id')
            ->join('promo','produk.promo_id','=','promo.id')
            ->select('keranjang.*','produk.nama_produk','produk.foto_produk','produk.harga','promo.promo_bronze','promo.promo_silver','promo.promo_gold','promo.status')
            ->where('keranjang.users_id', Auth::user()->id)
            ->get();

        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('keranjang', compact('keranjang','user'));

    }

    public function setActive(Request $request) {
        $keranjang = Keranjang::where('id', $request->id)->first();
        $keranjang->set_active = $request->status;
        $keranjang->save();
        return response()->json(['message', 'success']);
    }

    public function tambahKeranjang($id){
        // dd($id);
        $keranjang = new Keranjang;
        $keranjang->users_id = Auth::user()->id;
        $keranjang->produk_id = $id;
        $keranjang->save();

        return redirect('keranjang');
    }

    public function ubah_alamat(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('alamatbaru', compact('user'));
    }

    public function ubahAlamatPost(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required|numeric',
            'alamat' => 'required'
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->no_telepon = $request->no_telepon;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect('konfirm-checkout');
    }

    public function keranjang(Request $request, $id){
        $barang = Produk::where('id', $id)->first();
        $keranjang = new Keranjang;
        $keranjang->users_id = Auth::user()->id;
        $keranjang->produk_id = $id;
        $keranjang->jumlah_pesan = $request->jumlah_pesan;
        $keranjang->save();

        // cek validasi
        // $cek_pesan = Transaksi::where('users_id', Auth::user()->id)->where('status', 0)->first();
        // $random = mt_rand(100, 999);
        // if(empty($cek_pesan)){
        //    // simpan ke database pesanan
        //     $pesanan = new Transaksi;
        //     $pesanan->kode_transaksi = 'INV'.'/'.date('Y-m-d').'/'.$random;
        //     $pesanan->users_id = Auth::user()->id;
        //     $pesanan->total_produk = $request->jumlah_pesan;
        //     $pesanan->total_harga = 0;
        //     $pesanan->save();
        //     // dd($pesanan);die;
        // }

        // // simpan ke database pesanan detail
        // $pesanan_baru = pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // $pesanan_baru = Transaksi::where('users_id', Auth::user()->id)->where('status', 0)->first();
        // dd($pesanan_baru->id);die;
        // // cek pesanan detail
        // $cek_detail = DetailTransaksi::where('produk_id', $barang->id)->where('transaksi_id', $pesanan_baru->id)->first();
        // if (empty($cek_detail)) {
        //     $pesanan_detail = new DetailTransaksi;
        //     $pesanan_detail->transaksi_id = $pesanan_baru->id;
        //     $pesanan_detail->produk_id = $barang->id;
        //     $pesanan_detail->qty = $request->jumlah_pesan;
        //     $pesanan_detail->sub_total = $barang->harga;
        //     $pesanan_detail->save();
        // }
        // else {
        //     # code...
        // }

        // $cek_pesanan_detail = pesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        // if(empty($cek_pesanan_detail)){
        //     $pesanan_detail = new pesananDetail;
        //     $pesanan_detail->barang_id = $barang->id;
        //     $pesanan_detail->pesanan_id = $pesanan_baru->id;
        //     $pesanan_detail->jumlah = $request->jumlah_pesan;
        //     $pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
        //     $pesanan_detail->save();
        // }else{
        //     $pesanan_detail = pesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        //     $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;
        //     //harga barang sekarang
        //     $harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
        //     $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
        //     $pesanan_detail->update();
        // }
        // // jumlah pesanan
        // $pesanan = Transaksi::where('users_id', Auth::user()->id)->where('status', 0)->first();
        // $pesanan->total_harga = $pesanan->total_harga+$barang->harga*$request->jumlah_pesan;
        // $pesanan->update();

        // Alert()->success('Pesan Sukses Masuk Kernajang', 'Berhasil');
        // return redirect('checkout');


        return redirect('keranjang');

    }

    public function delete($id){
        // dd($id);die;
        // $detail_transaksi = DB::table('detail_transaksi')->where('id',$id)->first();
        // dd($detail_transakai);
        // $transaksi = DB::table('transaksi')->where('users_id', Auth::user()->id)->where('status','0')->first();

        // DB::table('transaksi')->where('users_id', Auth::user()->id)->where('status','0')
        // ->update([
        //     'total_produk' => $transaksi->total_produk-$detail_transaksi->qty,
        //     'total_harga' => $transaksi->total_harga-$detail_transaksi->sub_total,
        // ]);

        // dd($transaksi);die;
        // DB::table('keranjang')->where('users_id', Auth::user()->id)->where('produk_id', $transaksi->produk_id)->delete();
        // DB::table('transaksi')->where('id', $id)->delete();
        // DB::table('detail_transaksi')->where('transaksi_id', $id)->delete();
        // DB::table('detail_transaksi')->where('id',$id)->delete();
        // if (DB::table('transaksi')->where('users_id', Auth::user()->id)->where('total_produk','0')->where('total_harga','0')->first()) {
        //     DB::table('transaksi')->where('users_id', Auth::user()->id)->where('total_produk','0')->where('total_harga','0')->delete();
        // }



        DB::table('keranjang')->where('id',$id)->delete();
        return redirect('keranjang');
    }

    public function riwayat_transaksi(){
        $user = DB::table('users')->where('id', Auth::user()->id)->first();

        $pesanan = DB::table('detail_transaksi')
        ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        ->join('produk', 'detail_transaksi.produk_id','=','produk.id')
        ->select('transaksi.*','transaksi.total_produk','transaksi.total_harga','transaksi.users_id')
        ->where('transaksi.users_id', Auth::user()->id)
        ->where('transaksi.status', '0')
        ->first();
        if(!empty($pesanan)){
            // $pesanan_detail = DB::table('detail_transaksi')
            // ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
            // ->join('produk','detail_transaksi.produk_id','=','produk.id')
            // ->join('promo','produk.promo_id','=','promo.id')
            // ->select('transaksi.*','transaksi.status','transaksi.total_produk','transaksi.total_harga','transaksi.users_id','produk.foto_produk','produk.nama_produk','produk.harga','promo.status','promo.promo')
            // ->where('transaksi.users_id', Auth::user()->id)
            // ->where('transaksi.status', '1')
            // ->get();
            $pesanan_detail = DB::table('detail_transaksi')
            ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
            ->join('produk','detail_transaksi.produk_id','=','produk.id')
            ->join('promo','produk.promo_id','=','promo.id')
            ->select('detail_transaksi.sub_total','produk.foto_produk','produk.nama_produk','produk.kode_produk','produk.harga','detail_transaksi.qty','transaksi.kode_transaksi','transaksi.status','promo.promo_bronze','promo.promo_silver','promo.promo_gold','detail_transaksi.transaksi_id')
            ->where('users_id', Auth::user()->id)
            ->orderBy('detail_transaksi.id', 'desc')
            ->get();



        }
        if(empty($pesanan_detail)){
            return view('riwayat_transaksi', compact('pesanan'));
        }else{
            return view('riwayat_transaksi', compact('pesanan','pesanan_detail','user'));
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Keranjang;
use App\Models\Book;
// use Alert;
// use SweetAlert;

class PesanController extends Controller
{
    public function index($id){
        $barangs = DB::table('produk')->get();

        $barang = DB::table('produk')
        ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
        ->join('merek', 'produk.merek_id', '=', 'merek.id')
        ->join('promo', 'produk.promo_id', '=', 'promo.id')
        ->join('detail_produk', 'produk.detail_produk_id', '=', 'detail_produk.id')
        ->select('produk.*','kategori.kategori','detail_produk.deskripsi','promo.status','promo.promo_bronze','promo.promo_silver','promo.promo_gold')
        ->where('produk.id', '=' ,$id)
        ->first();

        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        // var_dump($barang);die

        return view('detail', compact('barang','barangs','user'));
    }

    public function pesan(Request $request, $id){
        $barang = DB::table('produk')->where('produk.id', $id)
        ->join('promo','produk.promo_id','=','promo.id')
        ->select('produk.*','promo.promo','promo.status')
        ->first();
        if ($barang->status = 1) {
            $harga = $barang->harga-$barang->harga*$barang->promo/100;
            // dd($harga);
        } else {
            $harga = $barang->harga;
        }

        $keranjang = new Keranjang;
        $keranjang->users_id = Auth::user()->id;
        $keranjang->produk_id = $id;
        $keranjang->save();


        $transaksi = Transaksi::where('users_id', Auth::user()->id)->where('status',0)->first();
        // dd($transaksi->total_produk);
        if (empty($transaksi)) {
            $random = mt_rand(100, 999);
            $pesan = new Transaksi;
            $pesan->kode_transaksi = 'INV/'. date('Ymd').'/'.$random;
            $pesan->users_id = Auth::user()->id;
            $pesan->total_produk = $request->jumlah_pesan;
            $pesan->total_harga = 0;
            // $pesan->nama_penerima = $request->nama;
            // $pesan->no_telepon_penerima = $request->no_telepon;
            // $pesan->alamat_penerima = $request->alamat;
            $pesan->save();
        }else{
            $pesanan = Transaksi::where('users_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->total_produk = $pesanan->total_produk+$request->jumlah_pesan;
            // $pesanan->total_harga = $pesanan->total_harga+$barang->harga*$request->jumlah_pesan;
            $pesanan->update();
        }




        // $tanggal = Carbon::now();
        $barang = DB::table('produk')->where('produk.id', $id)->first();

        // // simpan ke database pesanan detail
        $pesanan_baru = DB::table('transaksi')->where('users_id', Auth::user()->id)->where('status', 0)->first();
        // $pesan = $pesanan_baru->id;
        $promo = DB::table('detail_transaksi')
        ->join('produk','detail_transaksi.produk_id','=','produk.id')
        ->join('promo','produk.promo_id','=','promo.id')
        ->select('promo.*')
        ->get();
        // // cek pesanan detail
        $cek_pesanan_detail = DetailTransaksi::where('produk_id', $barang->id)->where('transaksi_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)){
            $pesanan_detail = new DetailTransaksi;
            $pesanan_detail->transaksi_id = $pesanan_baru->id;
            $pesanan_detail->produk_id = $barang->id;
            $pesanan_detail->qty = $request->jumlah_pesan;
            $pesanan_detail->sub_total = $harga*$request->jumlah_pesan;
            $pesanan_detail->save();
        }else{
            $pesanan_detail = DetailTransaksi::where('produk_id', $barang->id)->where('transaksi_id', $pesanan_baru->id)->first();
            $pesanan_detail->qty = $pesanan_detail->qty+$request->jumlah_pesan;
            //harga barang sekarang
            $harga_pesanan_detail_baru = $harga*$request->jumlah_pesan;
            $pesanan_detail->sub_total = $pesanan_detail->qty+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }
        // jumlah pesanan
        $pesanan = Transaksi::where('users_id', Auth::user()->id)->where('status', 0)->first();
        // $pesanan->total_produk = $pesanan->total_produk+$request->jumlah_pesan;
        $pesanan->total_harga = $pesanan->total_harga+$harga*$request->jumlah_pesan;
        $pesanan->update();

        Alert()->success('Berhasil', 'Berhasil di masukan ke keranjang');
        return redirect('keranjang');
    }

    public function beli(Request $request){
        // dd($request->all());
        $user = DB::table('users')->where('id',Auth::user()->id)->first();

        $dataProduct = [];
        $total_harga = 0;
        // $user = DB::table('users')->where('id', Auth::user()->id)->first();  
        // // dd($promo);die;
        // if ($user->level_id == $request->promo) {
        //    $promo = 'promo_bronze';
        // //    dd($promo);die;
        // } elseif($user->level_id == $request->promo) {
        //     $promo = 'promo_silver';
        //     // dd($promo);die;
        // }elseif($user->level_id == $request->promo) {
        //     $promo = 'promo_gold';
        // }

        // dd($promo);die;
        


        foreach($request->product_id as $row => $key)
        {

            if($request->product_flag[$row] == 1){
                $products = Produk::join('promo','produk.promo_id','=','promo.id')
                ->find($request->product_id[$row]);
                // dd($products);
                if ($user->level_id == 4) {
                    if ($products->status == 1) {
                        $hargain = $products->harga-$products->harga*$products->promo_bronze/100;
                    }
                    else{
                        $hargain = $products->harga;
                    }
                }
                elseif($user->level_id == 5){
                    if ($products->status == 1) {
                        $hargain = $products->harga-$products->harga*$products->promo_silver/100;
                    }
                    else{
                        $hargain = $products->harga;
                    }
                }
                elseif($user->level_id == 6){
                    if ($products->status == 1) {
                        $hargain = $products->harga-$products->harga*$products->promo_gold/100;
                    }
                    else{
                        $hargain = $products->harga;
                    }
                }

                // dd($hargain);
                // $products = Produk::find($request->product_id[$row]);
                $product['product_id'] = $request->product_id[$row];
                $product['foto_produk'] = $products->foto_produk;
                $product['nama_product'] = $products->nama_produk;

                // $product['harga'] = $products->harga-$products->harga*$products->promo_silver/100;
                $product['harga'] = $hargain;

                $product['jumlah'] = $request->jumlah_pesan[$row];

                // $hsl = $products->harga-$products->harga*$products->promo_silver/100;

                $product['hasil'] = $request->jumlah_pesan[$row] * $hargain;
                array_push($dataProduct, $product);

                // $jml = $products->harga-$products->harga*$products->promo_silver/100;
                $total_harga += $request->jumlah_pesan[$row] * $hargain;
                // dd($hsl);
            }
        }

        // dd($dataProduct);

        $data['total_harga'] = $total_harga;
        $data['product'] = $dataProduct;
        $data['user'] = User::where('id', Auth::user()->id)->first();
        $data['alamat_alternatif'] = DB::table('detail_users')->where('users_id', Auth::user()->id)->get();
        return view('beli', $data);
    }

    public function tambahAlamat(Request $request) {
        $alamat = DB::table('detail_users')->insert([
            'users_id' => Auth::user()->id,
            'nama_alternatif' => $request->nama_alternatif,
            'no_telepon_alternatif' => $request->no_telepon_alternatif,
            'alamat_alternatif' => $request->alamat_alternatif
        ]);

        $new = $request->all();

        return response()->json($new);
    }

    public function confirmasi(Request $request){
        dd($request->all());die;
        $transaksi = Transaksi::where('users_id', Auth::user()->id)->where('status',0)->first();
        dd($transaksi);
        // dd($transaksi->total_produk);
        // if (empty($transaksi)) {
            $random = mt_rand(100, 999);
            $pesan = new Transaksi;
            $pesan->kode_transaksi = 'INV/'. date('Ymd').'/'.$random.$transaksi->id;
            $pesan->users_id = Auth::user()->id;
            $pesan->total_produk = 0;
            $pesan->total_harga = $request->total;
            $pesan->status = 0;
            $pesan->nama_penerima = $request->nama;
            $pesan->no_telepon_penerima = $request->no_telepon;
            $pesan->alamat_penerima = $request->alamat;
            $pesan->pembayaran = $request->pembyaran;
            $pesan->save();

            // dd($pesan);

            $produk = $request->id_produk;
            $qty = $request->jumlah;
            $sub = $request->harga;

            // }
            foreach ($produk as $key => $value) {
                $detail = new DetailTransaksi;
                $detail->transaksi_id = $pesan->id;
                $detail->produk_id = $value;
                $detail->qty = $qty[$key];
                $detail->sub_total = $sub[$key];
                $detail->save();
            }

            // }
            $jml = DB::table('detail_transaksi')
            ->where('detail_transaksi.transaksi_id', $pesan->id)
            ->sum('qty');
            // dd($jml);

            // else{
                $pesanan = Transaksi::where('users_id', Auth::user()->id)->where('status', 0)->first();
                $pesanan->total_produk = $jml;
                $pesanan->status = 0;
                $pesanan->update();

                $hapus = DB::table('keranjang')->where('users_id', Auth::user()->id)->delete();
                dd($hapus);
                // return redirect('riwayat_transaksi');
                return redirect('bayar');
                // }
    }

    public function konfirmasi(Request $request){

        dd($request->all());die;

        $user = User::where('id', Auth::user()->id)->first();
        if(empty($user->nama)){
            Alert()->success('Identitas harus di lengkapi', 'Gagal');
            return redirect('profil');
        }
        if(empty($user->no_telepon)){
            Alert()->success('Identitas harus di lengkapi', 'Gagal');
            return redirect('profil');
        }

        if(empty($user->alamat)){
            Alert()->success('Identitas harus di lengkapi', 'Gagal');
            return redirect('profil');
        }

        $join = DB::table('detail_transaksi')
                ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
                ->where('transaksi.users_id', Auth::user()->id)
                ->where('transaksi.status', '0')
                ->get();

        // foreach ($join as $item) {
        //     $produk = Produk::where('id', $item->produk_id)->first();
        //     $produk->stok = $produk->stok-$item->total_produk;
        //     $produk->update();
        // }


        $ada = DB::table('detail_transaksi')
        ->join('transaksi','detail_transaksi.transaksi_id','=','transaksi.id')
        ->select('detail_transaksi.*','transaksi.total_produk','transaksi.total_harga','transaksi.users_id')
        ->where('transaksi.users_id', Auth::user()->id)
        ->get();


        // Alert()->success('Pesan Sukses Konfirm', 'Berhasil');
        return view('checkout', compact('user'));
    }


    public function bayar(Request $request){
        // dd($request->all());

        $random = mt_rand(100, 999);
        $pesan = new Transaksi;
        $pesan->kode_transaksi = 'INV/'. date('Ymd').'/'.$random;
        $pesan->users_id = Auth::user()->id;
        $pesan->total_produk = 0;
        $pesan->total_harga = $request->total;
        $pesan->status = 0;
        $pesan->nama_penerima = $request->nama;
        $pesan->no_telepon_penerima = $request->no_telepon;
        $pesan->alamat_penerima = $request->alamat;
        $pesan->pembayaran = $request->pembayaran;
        $pesan->save();

        // dd($pesan);


        foreach ($request->id_produk as $key => $value) {
            // dd($request->hasil);
            $detail = new DetailTransaksi;
            $detail->transaksi_id = $pesan->id;
            // $detail->produk_id = $request->id_produk[$key];
            $detail->produk_id = $value;
            $detail->qty = $request->jumlah[$key];
            // $detail->sub_total = $request->harga[$key];
            $detail->sub_total = $request->hasil[$key];
            $detail->save();
        }
        // dd($request->id_produk);
        // foreach ($request->id_produk as $key => $value) {
        // foreach ($request->id_produk as $key) {
        //     // dd($value);
        //     $produk = Produk::where('id', $request->id_produk[$key])->first();
        //     // $produk = Produk::where('id', $value)->first();
        //     // dd($produk);
        //     $produk->stok = $produk->stok - $request->jumlah[$key];
        //     // dd($produk->stok);
        //     $produk->update();
        // }
        // dd($produk);

        // }
        $jml = DB::table('detail_transaksi')
        ->where('detail_transaksi.transaksi_id', $pesan->id)
        ->sum('qty');

        // dd($jml);

        // else{
        $pesanan = Transaksi::where('users_id', Auth::user()->id)->where('status', 0)->orderBy('transaksi.id',"DESC")->first();
        // dd($pesanan);
        $pesanan->total_produk = $jml;
        $pesanan->status = 0;
        $pesanan->update();

        foreach ($request->id_produk as $key => $value) {
            $keranjangDel = Keranjang::where('users_id', auth()->user()->id)
                                ->where('produk_id', $request->id_produk[$key]);
            $keranjangDel->delete();
        }

        return redirect('riwayat_transaksi')->with('transaksi','Selamat Pesanan Anda Berhasil');



        // $data['total_harga'] = $request->total;
        // $pesanans = [];
        // foreach($request->id_produk as $row => $key)
        // {
        //     $productCek = Produk::find($request->id_produk[$row]);
        //     $data_pesanan['foto_produk'] = $productCek->foto_produk;
        //     $data_pesanan['nama_produk'] = $productCek->nama_produk;
        //     $data_pesanan['jumlah'] = $request->jumlah[$row];
        //     $data_pesanan['harga'] =  $productCek->harga;
        //     $data_pesanan['hasil'] = $request->jumlah[$row] * $productCek->harga;
        //     array_push($pesanans, $data_pesanan);

        // }
        // foreach ($request->id_produk as $key => $value) {
        //     $keranjangDel = Keranjang::where('users_id', auth()->user()->id)
        //                         ->where('produk_id', $request->id_produk[$key]);
        //     $keranjangDel->delete();
        // }

        // $data['pesanans'] = $pesanans;
        // $data['user'] = User::where('id', Auth::user()->id)->first();


        // $data['tanggalbesok'] = Carbon::now()->addDays(1);
        // return view('bayarpesanan', $data);
    }

    public function langsungBeli($id){
        $user = User::where('id', Auth::user()->id)->first();
        // $produk = Produk::find($id);
        $produk = DB::table('produk')
                ->join('promo','produk.promo_id','=','promo.id')
                ->where('produk.id', $id)
                ->select('produk.*','promo.status','promo.promo_bronze','promo.promo_silver','promo.promo_gold')
                ->first();
        // dd($produk);
        return view('langsungbeli', compact('produk','user'));
    }

    public function konfirmbeli(Request $request){
        // dd($request->all());

        $random = mt_rand(100, 999);
        $pesan = new Transaksi;
        $pesan->kode_transaksi = 'INV/'. date('Ymd').'/'.$random;
        $pesan->users_id = Auth::user()->id;
        $pesan->total_produk = $request->jumlah_pesan;
        $pesan->total_harga = $request->total_harga;
        $pesan->status = 0;
        $pesan->nama_penerima = $request->nama;
        $pesan->no_telepon_penerima = $request->no_telepon;
        $pesan->alamat_penerima = $request->alamat;
        $pesan->save();

        $detail_transaksi = new DetailTransaksi;
        $detail_transaksi->transaksi_id = $pesan->id;
        $detail_transaksi->produk_id = $request->id_produk;
        $detail_transaksi->qty = $request->jumlah_pesan;
        $detail_transaksi->sub_total = $request->harga;
        $detail_transaksi->save();

        // $produk_stok = Produk::find($request->id_produk);
        // $produk_stok->stok = $produk_stok->stok-$request->jumlah_pesan;
        // $produk_stok->save();

        return redirect('riwayat_transaksi')->with('transaksi','Selamat Pesanan Anda Berhasil');

        // $id_produk = $request->id_produk;
        // $harga = $request->harga;
        // $jumlah = $request->jumlah_pesan;
        // $hasil = $request->hasil;
        // $total_harga = $request->total_harga;
        // dd($harga,$jumlah,$hasil,$total_harga);

        // $user = User::where('id', Auth::user()->id)->first();

        // $tanggalbesok = Carbon::now()->addDays(1);

        // $produk = DB::table('produk')
        // ->where('id', $id_produk)
        // ->where('users_id', Auth::user()->id)
        // ->first();
        // dd($produk);

        // return redirect('riwayat_transaksi');
        // return view('bayarpesanan1', compact('user', 'produk', 'harga', 'jumlah', 'hasil', 'total_harga','tanggalbesok'));
        // return $harga;
    }

    public function langsungkonfirmasi(Request $request, $id){
        dd($id);
        $tanggal = Carbon::now();
        $barang = DB::table('produk')->where('produk.id', $id)
        ->join('promo','produk.promo_id','=','promo.id')
        ->select('produk.*','produk.harga','produk.stok','produk.id','promo.status','promo.promo')
        ->first();
        $tanggal = Carbon::now();

        if($request->jumlah_pesan > $barang->stok){
            return redirect('pesan/' .$id);
        }

        if ($barang->status == 'Aktif') {
            $harga = $barang->harga*50/100;
        } else {
            $harga = $barang->harga;
        }


        $transaksi = new Transaksi;
        $transaksi->users_id = Auth::user()->id;
        $transaksi->produk_id = $barang->id;
        $transaksi->total_produk = $request->jumlah_pesan;
        $transaksi->total_harga = $harga*$request->jumlah_pesan;
        $transaksi->save();


        $random = mt_rand(100, 999);

        $detail_transaksi = new DetailTransaksi;
        $detail_transaksi->transaksi_id = $transaksi->id;
        $detail_transaksi->kode_transaksi = 'INV/'.date('Ymd').'/'.$random.$transaksi->id;
        $detail_transaksi->produk_id = $barang->id;
        $detail_transaksi->save();

        // Alert()->success('Pesan Sukses Masuk Kernajang', 'Berhasil');
        return redirect('konfirm-checkout');
    }
}

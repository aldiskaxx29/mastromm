<?php
//user
use app\Http\Controllers\DashboardController;
use app\Http\Controllers\PesanController;
use app\Http\Controllers\AuthController;
use app\Http\Controllers\KeranjangController;
use app\Http\Controllers\ProdukPromoController;

//admin
use App\Http\Controllers\Admin\DasbordController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\MerekController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\LaporanInvoiceController;
use Illuminate\Support\Facades\Route;

//customer
use App\Http\Controllers\Customer\CS_KeranjangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// new

Route::get('keranjangin', [App\Http\Controllers\Customer\CS_KeranjangController::class, 'index']);

// endnew

Route::get('/', function () {
    return view('auth.login');
});

//login
Route::get('login', [App\Http\Controllers\AuthController::class, 'index']);
Route::post('login_user', [App\Http\Controllers\AuthController::class, 'login'])->name('login_user');
// logout
Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('lupa_password', [App\Http\Controllers\AuthController::class, 'lupa_password'])->name('lupapasword');
Route::post('password_baru', [App\Http\Controllers\AuthController::class, 'password_baru']);

Route::get('regist', [App\Http\Controllers\AuthController::class, 'regist'])->name('regist');
Route::post('registrasi', [App\Http\Controllers\AuthController::class, 'registrasi'])->name('registrasi');

//middeware
Route::group(['middleware' => ['cekLogin']], function(){

    Route::group(['middleware' => ['cekUser']], function(){

        //search
        Route::get('search', [App\Http\Controllers\DashboardController::class, 'search']);


        Route::get('profile', [App\Http\Controllers\AuthController::class, 'profil'])->name('profil');
        Route::post('ubah_profile/{id}', [App\Http\Controllers\AuthController::class, 'ubah_profil']);

        // user
        Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        Route::get('kategoriProduk/{id}', [App\Http\Controllers\DashboardController::class, 'kategoriProduk']);
        Route::get('shop', [App\Http\Controllers\DashboardController::class, 'shop']);

        Route::get('pesan/{id}', [App\Http\Controllers\PesanController::class, 'index'])->name('index');
        Route::post('pesan/{id}', [App\Http\Controllers\PesanController::class, 'pesan'])->name('pesan');

        // keranjang
        Route::get('keranjang', [App\Http\Controllers\KeranjangController::class, 'index'])->name('keranjang');
        Route::put('/set-active', [App\Http\Controllers\KeranjangController::class, 'setActive'])->name('setactive');
        Route::get('hapus-keranjang/{id}', [App\Http\Controllers\KeranjangController::class, 'delete']);
        Route::get('keranjang/{id}', [App\Http\Controllers\KeranjangController::class, 'keranjang'])->name('keranjang');

        Route::get('tambah-keranjang/{id}', [App\Http\Controllers\KeranjangController::class, 'tambahKeranjang']);

        Route::get('ubah-alamat', [App\Http\Controllers\KeranjangController::class, 'ubah_alamat']);
        Route::post('ubahAlamatPost/{id}', [App\Http\Controllers\KeranjangController::class, 'ubahAlamatPost']);


        //checkout
        // Route::post('konfirm-checkout', [App\Http\Controllers\PesanController::class, 'konfirmasi']);
        Route::post('konfirm-checkout', [App\Http\Controllers\PesanController::class, 'beli']);

        // jajal
        Route::post('confirm-checkout', [App\Http\Controllers\PesanController::class, 'confirmasi'])->name('confirm-checkout');

        Route::post('tambah-alamat', [App\Http\Controllers\PesanController::class, 'tambahAlamat'])->name('tambah-alamat');
        //bayar
        Route::post('bayar', [App\Http\Controllers\PesanController::class, 'bayar']);
        Route::post('konfirm-beli', [App\Http\Controllers\PesanController::class, 'konfirmbeli']);
        //riwayat
        Route::get('riwayat_transaksi', [App\Http\Controllers\KeranjangController::class, 'riwayat_transaksi']);

        //langsungkonfirm
        Route::get('/action_bayar/{id}', [App\Http\Controllers\PesanController::class, 'langsungBeli']);
        // Route::get('/action_bayar/{id}', [App\Http\Controllers\PesanController::class, 'langsungkonfirmasi']);

        //promo
        Route::get('potonganPromo/{id}', [App\Http\Controllers\ProdukPromoController::class, 'promo1']);
    });

    //admin
    Route::group(['middleware' => ['cekAdmin']], function(){
        //dashbaord
        Route::get('dashboard_admin', [App\Http\Controllers\Admin\DasbordController::class, 'index'])->name('dashboard_admin');
        Route::get('profil_user', [App\Http\Controllers\Admin\DasbordController::class, 'profil'])->name('profil_user');
        Route::post('ubah_profil/{id}', [App\Http\Controllers\Admin\DasbordController::class, 'ubahProfil']);

        //users
        Route::get('users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('uesrs');
        Route::post('tambah_user', [App\Http\Controllers\Admin\UsersController::class, 'tambah'])->name('tambah');
        Route::delete('hapus_user/{id}', [App\Http\Controllers\Admin\UsersController::class, 'hapus']);
        Route::post('ubah_user/{id}', [App\Http\Controllers\Admin\UsersController::class, 'ubah']);
        Route::post('ubah_status/{id}', [App\Http\Controllers\Admin\UsersController::class, 'ubahStatus']);
        Route::post('ubah_role/{id}', [App\Http\Controllers\Admin\UsersController::class, 'ubahRole']);


        //produk
        Route::get('produk_barang', [App\Http\Controllers\Admin\ProdukController::class, 'index'])->name('produk_barang');
        Route::get('detail_barang/{id}', [App\Http\Controllers\Admin\ProdukController::class, 'detail']);
        Route::post('tambah_barang', [App\Http\Controllers\Admin\ProdukController::class, 'tambah'])->name('tambah_barang');
        Route::get('ubah_barang/{id}', [App\Http\Controllers\Admin\ProdukController::class, 'ubah']);
        Route::post('update_barang/{id}', [App\Http\Controllers\Admin\ProdukController::class, 'update']);
        Route::delete('hapus_barang/{id}', [App\Http\Controllers\Admin\ProdukController::class, 'hapus']);
        Route::get('kode', [App\Http\Controllers\Admin\ProdukController::class, 'kode']);

        //kateogri
        Route::get('data_kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('data_kategori');
        Route::post('tambah_kategori', [App\Http\Controllers\Admin\KategoriController::class, 'tambah'])->name('tambah_kategori');
        Route::post('ubah_kategori/{id}', [App\Http\Controllers\Admin\KategoriController::class, 'ubah']);
        Route::delete('hapus_kategori/{id}', [App\Http\Controllers\Admin\KategoriController::class, 'hapus']);

        //merek
        Route::get('merek', [App\Http\Controllers\Admin\MerekController::class, 'index'])->name('merek');
        Route::post('tambah_merek', [App\Http\Controllers\Admin\MerekController::class, 'tambah'])->name('tambah_merek');
        Route::post('ubah_merek/{id}', [App\Http\Controllers\Admin\MerekController::class, 'ubah']);
        Route::delete('hapus_merek/{id}', [App\Http\Controllers\Admin\MerekController::class, 'hapus']);

        //promo
        Route::get('promotion', [App\Http\Controllers\Admin\PromoController::class, 'index'])->name('promotion');
        Route::post('tambah_promo',[App\Http\Controllers\Admin\PromoController::class, 'tambah'])->name('tambah');
        Route::post('ubah_promo/{id}', [App\Http\Controllers\Admin\PromoController::class, 'ubah']);
        Route::delete('hapus_promo/{id}', [App\Http\Controllers\Admin\PromoController::class, 'hapus']);


        //transaksi
        Route::get('transaksi', [App\Http\Controllers\Admin\TransaksiController::class, 'index'])->name('transaksi');
        Route::delete('hapusTransaksi/{id}', [App\Http\Controllers\Admin\TransaksiController::class, 'hapus']);
        Route::post('ubahstatus/{id}', [App\Http\Controllers\Admin\TransaksiController::class, 'ubahStatus']);
        Route::get('cetakTransaksi', [App\Http\Controllers\Admin\TransaksiController::class, 'cetakTransaksi']);

        //laporan
        Route::get('laporan', [App\Http\Controllers\Admin\LaporanController::class, 'index'])->name('laporan');
        Route::post('filterLaporan', [App\Http\Controllers\Admin\LaporanController::class, 'filterLaporan']);
        Route::get('cetakLaporan/{dari}/{sampai}', [App\Http\Controllers\Admin\LaporanController::class, 'cetakLaporan']);
        Route::get('cetak_satuan/{dari}/{sampai}/{id}', [App\Http\Controllers\Admin\LaporanController::class, 'cetak_satuan']);

        //laporan Transaksi
        Route::get('laporan-invoice', [App\Http\Controllers\Admin\LaporanInvoiceController::class, 'index'])->name('laporan-invoice');
        Route::post('filterLaporanInvoice', [App\Http\Controllers\Admin\LaporanInvoiceController::class, 'filterLaporan']);
        Route::get('cetakLaporanInvoice/{dari}/{sampai}', [App\Http\Controllers\Admin\LaporanInvoiceController::class, 'cetakLaporan']);
        Route::get('cetak_satuanInvoice/{dari}/{sampai}/{id}', [App\Http\Controllers\Admin\LaporanInvoiceController::class, 'cetak_satuan']);
    });

});

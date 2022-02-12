<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'kategori_id',
		'merek_id',
		'promo_id',
		'detail_produk_id',
		'kode_produk',
		'nama_produk',
		'harga',
		'harga_promo',
		'foto_produk',
		'stok'
    ];

    public static function kode()
    {
    	$kode = DB::table('produk')->max('kode_produk');
    	$addNol = '';
    	$kode = str_replace("PDK", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "PDK".$addNol.$incrementKode;
		// dd($)
    	return $kodeBaru;
    }
}

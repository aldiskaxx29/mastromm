<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailTransaksi extends Model
{
    use HasFactory;

    use softDeletes;

    protected $table = 'detail_transaksi';
    // protected $primaryKey = 'id';
    // protected $guarded = [];
    protected $fillable = [
      // 'id',
      // 'transaksi_id',
      // 'kode_transaksi',
      // 'produk_id',
      // 'status',
      // 'nama_penerima',
      // 'no_telepon_penerima',
      // 'alamat_penerima'
      'transaksi_id',
      'produk_id',
      'qty',
      'sub_total',
    ];

    public function transaksi() {
		return $this->belongsTo(Transaksi::class, 'transaksi_id');
	  }

    public function produk() {
		return $this->belongsTo(Produk::class, 'produk_id');
	  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory;
    
    use softDeletes;

    // protected $table = 'transaksi';
    protected $table = 'transaksi';
	// protected $primaryKey = 'id';
	// protected $guarded = [];
	protected $fillable = [
		'kode_transaksi',
		'users_id',
		'total_produk',
		'total_harga',
		'status',
		'nama_penerima',
		'no_telepon_penerima',
		'alamat_penerima'
	];

    public function details() {
        return $this->hasOne(DetailTransaksi::class, 'transaksi_id');
    }

    public function user() {
		return $this->belongsTo(Users::class, 'users_id');
	}

	public function produk() {
		return $this->belongsTo(Users::class, 'produk_id');
	}
}

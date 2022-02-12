<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Keranjang extends Model
{
    use HasFactory;

    // use softDeletes;

    protected $table = 'keranjang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id',
        'produk_id',
        'set_active'
    ];
    protected $guarded = [];
}

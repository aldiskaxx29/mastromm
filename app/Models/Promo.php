<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promo';

    protected $fillable = [
        'promo_bronze',
        'promo_silver',
        'promo_gold',
        'foto_promo',
        'status',
    ];
}

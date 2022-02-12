<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Produk;

class ProdukPromoController extends Controller
{
    public function promo1(Request $request, $id){
        $promo = DB::table('produk')->where('promo_id', $id)
                ->join('promo','produk.promo_id','=','promo.id')
                ->select('produk.*','promo.status','promo.promo')
                ->get();
                // dd($promo);die;

        return view('promo/promo1', compact('promo'));
    }
}

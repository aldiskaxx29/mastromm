<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->unsignedBigInteger('merek_id')->nullable();
            $table->unsignedBigInteger('promo_id')->nullable();
            $table->unsignedBigInteger('detail_produk_id')->nullable();
            $table->string('kode_produk', 10)->unique();
            $table->string('nama_produk', 70)->unique();
            $table->bigInteger('harga');
            $table->bigInteger('harga_promo')->nullable();
            $table->string('foto_produk');
            $table->integer('stok');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}

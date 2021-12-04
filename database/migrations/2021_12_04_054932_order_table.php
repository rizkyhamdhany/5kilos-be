<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('code');
            $table->string('origin_nama');
            $table->string('origin_perusahaan');
            $table->string('origin_country');
            $table->string('origin_alamat');
            $table->string('origin_alamat2');
            $table->string('origin_alamat3');
            $table->string('origin_kodepos');
            $table->string('origin_kota');
            $table->string('origin_negara');
            $table->string('origin_email');
            $table->string('origin_phone');
            $table->string('origin_tax_info');
            $table->string('dest_nama');
            $table->string('dest_perusahaan');
            $table->string('dest_country');
            $table->string('dest_alamat');
            $table->string('dest_alamat2');
            $table->string('dest_alamat3');
            $table->string('dest_kodepos');
            $table->string('dest_kota');
            $table->string('dest_negara');
            $table->string('dest_email');
            $table->string('dest_phone');
            $table->string('dest_tax_info');
            $table->string('nilai_barang');
            $table->string('berat_barang');
            $table->string('deskripsi_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

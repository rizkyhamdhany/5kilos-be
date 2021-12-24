<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBoxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_boxes', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->decimal('p', 20);
            $table->decimal('l', 20);
            $table->decimal('t', 20);
            $table->timestamps();
        });
        Schema::create('order_box_items', function (Blueprint $table) {
            $table->id();
            $table->integer('box_id');
            $table->decimal('berat', 20);
            $table->string('desc', 20);
            $table->decimal('nilai', 20);
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
        Schema::dropIfExists('order_box');
        Schema::dropIfExists('order_box_items');
    }
}

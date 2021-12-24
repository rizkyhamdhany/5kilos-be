<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('kg', 20);
            $table->decimal('zone_1', 20);
            $table->decimal('zone_2', 20);
            $table->decimal('zone_3', 20);
            $table->decimal('zone_4', 20);
            $table->decimal('zone_5', 20);
            $table->decimal('zone_6', 20);
            $table->decimal('zone_7', 20);
            $table->decimal('zone_8', 20);
            $table->decimal('dimensi', 20);
            $table->timestamps();
        });

        Schema::create('zones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zone_id');
            $table->string('country_name');
            $table->string('country_code');
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
        Schema::dropIfExists('prices');
        Schema::dropIfExists('zones');
    }
}

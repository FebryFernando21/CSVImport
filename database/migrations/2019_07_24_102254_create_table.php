<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchings', function (Blueprint $table) {
        // $table->increments('id');
        // $table->string('first_name');
        // $table->string('last_name');
        // $table->string('email');
        // $table->timestamps();

        $table->string('tgl');
        $table->string('keterangan');
        $table->string('cabang');
        $table->string('jumlah');
        $table->string('saldo');
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
        Schema::dropIfExists('matchings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataFaktorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',20);
            $table->string('alternatif',20);
            $table->string('makan',10);
            $table->string('infeksi',10);
            $table->string('sanitasi',10);
            $table->string('asuh',10);
            $table->string('pangan',10);
            $table->string('miskin',10);
            $table->string('pendidikan',10);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}

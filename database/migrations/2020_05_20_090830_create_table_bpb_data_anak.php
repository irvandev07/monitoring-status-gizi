<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBpbDataAnak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpb_anak', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anak_ke');
            $table->date('tgl_lahir');
            $table->string('kelamin');
            $table->integer('no_kk');
            $table->integer('nik_anak')->unique();
            $table->string('nama_anak');
            $table->double('bb_lahir');
            $table->double('pb_lahir');
            $table->string('buku_kia');
            $table->string('imd');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->integer('no_hp');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('kampung');
            $table->string('status_ekonomi');
            $table->double('bb');
            $table->double('tb');
            $table->string('cara_ukur');
            $table->string('vitamin');
            $table->string('asi');
            $table->double('bb_2');
            $table->double('tb_2');
            $table->string('cara_ukur2');
            $table->string('vitamin_2');
            $table->string('asi_2');
            $table->string('pmt');
            $table->string('keterangan');
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
        Schema::dropIfExists('bpb_anak');
    }
}

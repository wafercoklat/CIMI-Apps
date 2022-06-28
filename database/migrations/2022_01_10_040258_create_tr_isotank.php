<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrIsotank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_isotank', function (Blueprint $table) {
            $table->id();
            $table->string('transnumber', 50);
            $table->integer('counter');
            $table->integer('iso_id');
            $table->integer('cust_id');
            $table->integer('ori_id');
            $table->integer('des_id');
            $table->integer('transport_id');
            $table->string('transport_det', 25)->nullable();
            $table->string('packinglist_no', 25)->nullable();
            $table->string('cargo_no', 25)->nullable();
            $table->string('deskripsi', 100)->nullable();
            $table->dateTime('tgl_bongkar');
            $table->dateTime('tgl_doring');
            $table->dateTime('tgl_muat');
            $table->dateTime('tgl_outdepo');
            $table->dateTime('tgl_indepo');
            $table->dateTime('tgl_ETA');
            $table->dateTime('tgl_ETD');
            $table->string('updateBy');
            $table->dateTime('update_date');
            $table->string('createdBy');
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
        Schema::dropIfExists('tr_isotank');
    }
}

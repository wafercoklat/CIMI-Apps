<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsotanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isotanks', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->string('plat_no', 10)->nullable();
            $table->string('deskripsi', 50)->nullable();
            $table->string('kepemilikan', 50)->nullable();
            $table->enum('status', ['NA', 'R', 'RT', 'BRO', 'NR', ])->default('R'); 
            //NA: Non Active, R:Ready, RT: Rent, BRO: Broke, NR:Not Ready
            $table->string('createdBy', 10);
            $table->datetime('createdDate');
            $table->string('modifyBy', 10)->nullable();
            $table->datetime('modifyDate')->nullable();
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
        Schema::dropIfExists('isotanks');
    }
}

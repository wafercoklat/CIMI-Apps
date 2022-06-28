<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->enum('role', ['adm', 'val', 'app', 'che', 'ops'])->default('ops');
            $table->enum('NA', ['Y', 'N'])->default('N');
            $table->rememberToken()->nullable();
            $table->timestamps();
        });

        Schema::create('active_users', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->datetime('start');
            $table->datetime('end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

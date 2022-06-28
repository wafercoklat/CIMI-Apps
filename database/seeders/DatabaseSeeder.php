<?php

namespace Database\Seeders;
use DB;
use Hash;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => strtolower('admin'),
            'password' => strtolower('admin123'),
            'role' => strtolower('adm')
        ]);
    }
}

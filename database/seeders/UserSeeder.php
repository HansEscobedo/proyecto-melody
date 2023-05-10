<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Italo',
            'email' => 'italo.donoso@ucn.cl',
            'password' => bcrypt('Melody91'),
            'role' => 2

        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@ad.min',
            'password' => bcrypt('soyadmin'),
            'role' => 2

        ]);

        DB::table('users')->insert([
            'name' => 'diego',
            'email' => 'd@d.d',
            'password' => bcrypt('diego123'),
            'role' => 1

        ]);
    }
}

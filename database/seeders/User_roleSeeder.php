<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_roles')->insert([
            'name' => 'Admin'
        ]);
        DB::table('user_roles')->insert([
            'name' => 'Worker'
        ]);
        DB::table('user_roles')->insert([
            'name' => 'Client'
        ]);
    }
}

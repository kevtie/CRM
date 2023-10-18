<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'kevtie',
            'email' => 'test@test.com',
            'password' => '$2a$12$4VM29VYP/3TQ3/15m3cSb.q8Sif1bxsIdPXU3Y5AaoFUiiE6/VMNu',
            'last_activity' => '2023-09-11 14:32:15',
            'role_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'testworker',
            'email' => 'testworker@test.com',
            'password' => '$2a$12$l01zFNiy9pKAhq/GYrCj8Ot2c/oRU6WmWFU2tEU9G3n90oKyS3NGS',
            'last_activity' => '2023-09-14 14:05:26',
            'role_id' => 2,
        ]);
    }
}

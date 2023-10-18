<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Card_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('card_types')->insert([
            'name' => 'Developer',
        ]);
        DB::table('card_types')->insert([
            'name' => 'Designer',
        ]);
        DB::table('card_types')->insert([
            'name' => 'Research',
        ]);
        DB::table('card_types')->insert([
            'name' => 'ClientInteraction',
        ]);
    }
}

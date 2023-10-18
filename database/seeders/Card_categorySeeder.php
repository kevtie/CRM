<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Card_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('card_categories')->insert([
            'name' => 'Todo',
            'ordering' => '2',
        ]);
        DB::table('card_categories')->insert([
            'name' => 'Doing',
            'ordering' => '3',
        ]);
        DB::table('card_categories')->insert([
            'name' => 'Done',
            'ordering' => '4',
        ]);
        DB::table('card_categories')->insert([
            'name' => 'Backlog',
            'ordering' => '1',
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            User_roleSeeder::class,
            Card_categorySeeder::class,
            Card_typeSeeder::class,
            User_roleSeeder::class,
            UserSeeder::class,
            BusinessSeeder::class,
            ClientSeeder::class,
            ScrumboardSeeder::class,
            CardSeeder::class,
            
        ]);
    }
}

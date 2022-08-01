<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { \App\Models\Favorite::factory(20)->create();
       \App\Models\User::factory(100)->create();
        \App\Models\Address::factory(100)->create();
        \App\Models\Auction::factory(100)->create();
       
        \App\Models\Image::factory(100)->create();
        \App\Models\Report::factory(10)->create();
         \App\Models\Review::factory(20)->create();

        \App\Models\UserBid::factory(20)->create();


    }
}

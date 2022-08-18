<?php

namespace Database\Seeders;

use App\Models\Nursery;
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
//        Group::factory( 1000 )->create();
        Nursery::factory( 50 )->create();
    }
}

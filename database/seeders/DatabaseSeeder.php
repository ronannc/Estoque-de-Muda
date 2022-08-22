<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Inventory;
use App\Models\Nursery;
use App\Models\Specie;
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
        Group::factory( 20 )->create();
        Nursery::factory( 10 )->create();
        Specie::factory( 50 )->create();
        Inventory::factory( 1000 )->create();
    }
}

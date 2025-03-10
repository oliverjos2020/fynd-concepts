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
    {
        // $this->call(StatesAndLgasSeeder::class);
        // \App\Models\User::factory(20)->create();
        // \App\Models\Vehicle::factory(50)->create();
        // \App\Models\CarBrand::factory(20)->create();
        // \App\Models\Location::factory(15)->create();
        // \App\Models\Photo::factory(500)->create();
        $this->call(UserSeeder::class);
    }
}

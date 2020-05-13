<?php

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
        $this->call(GearsTableSeeder::class);
        $this->call(GearTypesTableSeeder::class);
        $this->call(StringHistoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}

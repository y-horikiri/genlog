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
        if ( app()->isLocal() || app()->runningUnitTests() ) { // .env に APP_ENV=local (ローカル環境) または APP_ENV=testing (テスト環境) と書いてある場合
            // テスト環境, ローカル環境用の記述
            $this->call(GearsTableSeeder::class);
            $this->call(StringHistoriesTableSeeder::class);
            $this->call(UsersTableSeeder::class);
        }
        $this->call(GearTypesTableSeeder::class);
    }
}

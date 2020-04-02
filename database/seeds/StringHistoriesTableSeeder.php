<?php

use Illuminate\Database\Seeder;
use App\Models\StringHistory;

class StringHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データのクリア
        DB::table('string_histories')->truncate();

        $gear = new StringHistory([
            'user_id' => 1,
            'gear_id' => 1,
            'change_date' => '2020-04-01',
            'seq' => 1,
            'brand' => 'ダダリオ',
            'gauge_1' => 10,
            'gauge_2' => 13,
            'gauge_3' => 17,
            'gauge_4' => 26,
            'gauge_5' => 36,
            'gauge_6' => 46,
            'gauge_7' => null,
            'gauge_8' => null,
            'gauge_9' => null,
            'gauge_10' => null,
            'gauge_11' => null,
            'gauge_12' => null,
            'comment' => '最初の交換',
            'is_unknown' => false,
        ]);
        $gear->save();
    }
}

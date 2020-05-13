<?php

use Illuminate\Database\Seeder;

class StringHistoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('string_histories')->delete();

        \DB::table('string_histories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'user_id' => 1,
                'gear_id' => 1,
                'change_date' => '2020-01-01',
                'brand' => 'ダダリオ',
                'gauge_1' => '10',
                'gauge_2' => '13',
                'gauge_3' => '17',
                'gauge_4' => '26',
                'gauge_5' => '36',
                'gauge_6' => '46',
                'gauge_7' => NULL,
                'gauge_8' => NULL,
                'gauge_9' => NULL,
                'gauge_10' => NULL,
                'gauge_11' => NULL,
                'gauge_12' => NULL,
                'comment' => '最初の交換',
                'created_at' => '2020-04-07 16:46:15',
                'updated_at' => '2020-04-07 16:46:15',
            ),
            1 =>
            array (
                'id' => 2,
                'user_id' => 1,
                'gear_id' => 1,
                'change_date' => '2020-02-02',
                'brand' => 'エリクサー',
                'gauge_1' => '10',
                'gauge_2' => '13',
                'gauge_3' => '17',
                'gauge_4' => '26',
                'gauge_5' => '36',
                'gauge_6' => '46',
                'gauge_7' => NULL,
                'gauge_8' => NULL,
                'gauge_9' => NULL,
                'gauge_10' => NULL,
                'gauge_11' => NULL,
                'gauge_12' => NULL,
                'comment' => '2回目の交換',
                'created_at' => '2020-04-07 16:46:15',
                'updated_at' => '2020-04-07 16:46:15',
            ),
            2 =>
            array (
                'id' => 3,
                'user_id' => 1,
                'gear_id' => 2,
                'change_date' => '2020-04-07',
                'brand' => 'ダダリオ',
                'gauge_1' => '11',
                'gauge_2' => '15',
                'gauge_3' => '22',
                'gauge_4' => '32',
                'gauge_5' => '42',
                'gauge_6' => '52',
                'gauge_7' => NULL,
                'gauge_8' => NULL,
                'gauge_9' => NULL,
                'gauge_10' => NULL,
                'gauge_11' => NULL,
                'gauge_12' => NULL,
                'comment' => 'Phosphor Bronze',
                'created_at' => '2020-04-07 17:10:00',
                'updated_at' => '2020-04-07 17:10:00',
            ),
            3 =>
            array (
                'id' => 4,
                'user_id' => 1,
                'gear_id' => 3,
                'change_date' => '2020-03-18',
                'brand' => 'Ibanez',
                'gauge_1' => '09',
                'gauge_2' => '11',
                'gauge_3' => '16',
                'gauge_4' => '24',
                'gauge_5' => '32',
                'gauge_6' => '42',
                'gauge_7' => '52',
                'gauge_8' => '60',
                'gauge_9' => NULL,
                'gauge_10' => NULL,
                'gauge_11' => NULL,
                'gauge_12' => NULL,
                'comment' => '高かった',
                'created_at' => '2020-04-07 17:10:38',
                'updated_at' => '2020-04-07 17:10:38',
            ),
            4 =>
            array (
                'id' => 5,
                'user_id' => 1,
                'gear_id' => 4,
                'change_date' => '2020-04-07',
                'brand' => 'R.Cocco',
                'gauge_1' => '045',
                'gauge_2' => '065',
                'gauge_3' => '085',
                'gauge_4' => '105',
                'gauge_5' => NULL,
                'gauge_6' => NULL,
                'gauge_7' => NULL,
                'gauge_8' => NULL,
                'gauge_9' => NULL,
                'gauge_10' => NULL,
                'gauge_11' => NULL,
                'gauge_12' => NULL,
                'comment' => 'ステンレス',
                'created_at' => '2020-04-07 17:11:02',
                'updated_at' => '2020-04-07 17:11:02',
            ),
        ));


    }
}

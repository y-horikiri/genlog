<?php

use Illuminate\Database\Seeder;
use App\Models\Gear;
use Illuminate\Support\Facades\DB;

class GearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データのクリア
        DB::table('gears')->truncate();

        $gear = new Gear([
            'user_id' => 1,
            'name' => 'ストラト1号',
            'type' => 1,
            'string_count' => 6,
            'icon_id' => 1,
            'color' => 'blue',
        ]);
        $gear->save();

        $gear = new Gear([
            'user_id' => 1,
            'name' => 'マーチン',
            'type' => 2,
            'string_count' => 6,
            'icon_id' => 11,
            'color' => 'sb-3',
        ]);
        $gear->save();

        $gear = new Gear([
            'user_id' => 1,
            'name' => 'strandberg',
            'type' => 1,
            'string_count' => 8,
            'icon_id' => 2,
            'color' => 'black',
        ]);
        $gear->save();

        $gear = new Gear([
            'user_id' => 1,
            'name' => 'プレベっち',
            'type' => 3,
            'string_count' => 4,
            'icon_id' => 22,
            'color' => 'red',
        ]);
        $gear->save();

//        factory(Gear::class, 10)->create();

    }
}

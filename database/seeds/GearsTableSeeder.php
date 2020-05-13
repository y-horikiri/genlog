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
            'color' => 'blue',
        ]);
        $gear->save();

        $gear = new Gear([
            'user_id' => 1,
            'name' => 'マーチン',
            'type' => 2,
            'string_count' => 6,
            'color' => 'sb-3',
        ]);
        $gear->save();

        $gear = new Gear([
            'user_id' => 1,
            'name' => 'strandberg',
            'type' => 1,
            'string_count' => 8,
            'color' => 'black',
        ]);
        $gear->save();

        $gear = new Gear([
            'user_id' => 1,
            'name' => 'プレベっち',
            'type' => 3,
            'string_count' => 4,
            'color' => 'red',
        ]);
        $gear->save();

        $gear = new Gear([
            'user_id' => 1,
            'name' => 'Stingray',
            'type' => 3,
            'string_count' => 4,
            'color' => 'white',
        ]);
        $gear->save();

//        factory(Gear::class, 10)->create();

    }
}

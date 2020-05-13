<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\GearType;

class GearTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // データのクリア
        DB::table('gear_types')->truncate();

        $gear_type = new GearType([
            'gear_type' => 1,
            'name' => 'エレキギター',
            'default_string_count' => 6,
        ]);
        $gear_type->save();

        $gear_type = new GearType([
            'gear_type' => 2,
            'name' => 'アコースティックギター',
            'default_string_count' => 6,
        ]);
        $gear_type->save();

        $gear_type = new GearType([
            'gear_type' => 1,
            'name' => 'エレキベース',
            'default_string_count' => 4,
        ]);
        $gear_type->save();
    }
}

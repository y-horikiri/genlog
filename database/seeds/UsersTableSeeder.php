<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データのクリア
        DB::table('users')->truncate();

        $user = new User([
            'id' => 1,
            'name' => 'コウテイ',
            'auth_id' => 3249360800,
            'avatar' => "http://pbs.twimg.com/profile_images/848106243650535425/Fq8-bvSI_normal.jpg",
            'remember_token' => null,
        ]);
        $user->save();

        factory(User::class, 1)->create();
    }
}

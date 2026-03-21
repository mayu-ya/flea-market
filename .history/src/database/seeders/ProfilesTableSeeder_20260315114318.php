<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'name' => '花子',
            'post_code' => '987-6543',
            'address' => '東京都',
            'building' => 'かもめ'
        ];
        DB::table('profiles')->insert($param);
    }
}

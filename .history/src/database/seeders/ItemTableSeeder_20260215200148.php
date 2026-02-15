<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'image' => '',
            'merchandise_name' => '腕時計',
            'brand_name' => 'Rolax',
            'price' => 15000,
            'explanation' => 'スタイリッシュなデザインのメンズ時計',
            'condition' => ''
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'image' => '',
            'merchandise_name' => 'HDD',
            'brand_name' => '西芝',
            'price' => ,
            'explanation' => '高速で信頼性の高いハードディスク',
            'condition' => ''
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'image' => '',
            'merchandise_name' => '玉ねぎ3束',
            'brand_name' => 'なし',
            'price' => ,
            'explanation' => '新鮮な玉ねぎの3束セット',
            'condition' => ''
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'image' => '',
            'merchandise_name' => '革靴',
            'price' => ,
            'explanation' => 'クラシックなデザインの革靴',
            'condition' => ''
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'image' => '',
            'merchandise_name' => 'ノートPC',
            'price' => ,
            'explanation' => '高性能なノートパソコン',
            'condition' => ''
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'image' => '',
            'merchandise_name' => 'マイク',
            'brand_name' => 'なし',
            'price' => ,
            'explanation' => '高音質のレコーディング用マイク',
            'condition' => ''
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'image' => '',
            'merchandise_name' => 'ショルダーバッグ',
            'price' => ,
            'explanation' => 'おしゃれなショルダーバッグ',
            'condition' => ''
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'image' => '',
            'merchandise_name' => 'タンブラー',
            'brand_name' => 'なし',
            'price' => ,
            'explanation' => '使いやすいタンブラー',
            'condition' => ''
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'image' => '',
            'merchandise_name' => 'コーヒーミル',
            'brand_name' => 'Starbacks',
            'price' => ,
            'explanation' => '手動のコーヒーミル',
            'condition' => ''
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'image' => '',
            'merchandise_name' => 'メイクセット',
            'price' => ,
            'explanation' => '便利なメイクアップセット',
            'condition' => ''
        ];
        DB::table('merchandises')->insert($param);
    }
}

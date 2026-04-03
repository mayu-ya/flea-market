<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'profile_id' => 1,
            'image' => 'storage/item/Armani+Mens+Clock.jpg',
            'merchandise_name' => '腕時計',
            'brand_name' => 'Rolax',
            'price' => 15000,
            'explanation' => 'スタイリッシュなデザインのメンズ時計',
            'condition' => 1
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'profile_id' => 1,
            'image' => 'storage/item/HardDisk.jpg',
            'merchandise_name' => 'HDD',
            'brand_name' => '西芝',
            'price' => 5000,
            'explanation' => '高速で信頼性の高いハードディスク',
            'condition' => 2
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'profile_id' => 1,
            'image' => 'storage/item/iLoveIMG+d.jpg',
            'merchandise_name' => '玉ねぎ3束',
            'brand_name' => 'なし',
            'price' => 300,
            'explanation' => '新鮮な玉ねぎの3束セット',
            'condition' => 3
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'profile_id' => 1,
            'image' => 'storage/item/Leather+Shoes+Product+Photo.jpg',
            'merchandise_name' => '革靴',
            'price' => 4000,
            'explanation' => 'クラシックなデザインの革靴',
            'condition' => 4
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'profile_id' => 1,
            'image' => 'storage/item/Living+Room+Laptop.jpg',
            'merchandise_name' => 'ノートPC',
            'price' => 45000,
            'explanation' => '高性能なノートパソコン',
            'condition' => 1
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'profile_id' => 1,
            'image' => 'storage/item/Music+Mic+4632231.jpg',
            'merchandise_name' => 'マイク',
            'brand_name' => 'なし',
            'price' => 8000,
            'explanation' => '高音質のレコーディング用マイク',
            'condition' => 2
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'profile_id' => 1,
            'image' => 'storage/item/Purse+fashion+pocket.jpg',
            'merchandise_name' => 'ショルダーバッグ',
            'price' => 3500,
            'explanation' => 'おしゃれなショルダーバッグ',
            'condition' => 3
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'profile_id' => 1,
            'image' => 'storage/item/Tumbler+souvenir.jpg',
            'merchandise_name' => 'タンブラー',
            'brand_name' => 'なし',
            'price' => 500,
            'explanation' => '使いやすいタンブラー',
            'condition' => 4
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'profile_id' => 1,
            'image' => 'storage/item/Waitress+with+Coffee+Grinder.jpg',
            'merchandise_name' => 'コーヒーミル',
            'brand_name' => 'Starbacks',
            'price' => 4000,
            'explanation' => '手動のコーヒーミル',
            'condition' => 1
        ];
        DB::table('merchandises')->insert($param);
        $param = [
            'profile_id' => 1,
            'image' => 'storage/item/makeupset.jpg',
            'merchandise_name' => 'メイクセット',
            'price' => 2500,
            'explanation' => '便利なメイクアップセット',
            'condition' => 2
        ];
        DB::table('merchandises')->insert($param);
    }
}

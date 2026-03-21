<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => 'ファッション'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => '家電'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => 'インテリア'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => 'レディース'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => 'メンズ'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => 'コスメ'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => '本'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => 'ゲーム'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => 'スポーツ'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => 'キッチン'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => 'ハンドメイド'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => 'アクセサリー'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => 'おもちゃ'
        ];
        DB::table('categoris')->insert($param);
        $param = [
            'content' => 'ベビー・キッズ'
        ];
        DB::table('categoris')->insert($param);
    }    
}

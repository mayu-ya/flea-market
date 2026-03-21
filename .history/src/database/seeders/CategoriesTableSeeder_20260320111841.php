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
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => '家電'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => 'インテリア'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => 'レディース'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => 'メンズ'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => 'コスメ'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => '本'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => 'ゲーム'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => 'スポーツ'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => 'キッチン'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => 'ハンドメイド'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => 'アクセサリー'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => 'おもちゃ'
        ];
        DB::table('Categoris')->insert($param);
        $param = [
            'content' => 'ベビー・キッズ'
        ];
        DB::table('Categoris')->insert($param);
    }    
}

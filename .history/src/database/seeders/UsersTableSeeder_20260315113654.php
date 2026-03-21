<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_name' => '山田　花子',
            'email' => 'hanako@example.com',
            'password' => 'password'
        ];
        DB::table('users')->insert($param);
    }
}

<?php

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
        \App\User::create([
            'name' => 'LiCxi',
            'email' => 'licxisky@qq.com',
            'password' => bcrypt('961221'),
        ]);
    }
}

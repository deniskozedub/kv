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
        App\User::insert([
            'email' => 'admin@admin.com',
            'name' => 'admin',
            'password' =>  bcrypt('password')
        ]);
    }
}

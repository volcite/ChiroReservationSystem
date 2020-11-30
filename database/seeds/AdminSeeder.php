<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone_number' => '12345678',
            'gender' => 0,
            'birthday' => '2020-01-01',
            'password' => bcrypt('admin'),
            'authority' => 100,
        ]);
    }
}

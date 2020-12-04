<?php

use Illuminate\Database\Seeder;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')->insert([
            'time_number' => '9:00',
        ]);
        DB::table('times')->insert([
            'time_number' => '10:00',
        ]);
        DB::table('times')->insert([
            'time_number' => '11:00',
        ]);
        DB::table('times')->insert([
            'time_number' => '12:00',
        ]);
        DB::table('times')->insert([
            'time_number' => '15:00',
        ]);
        DB::table('times')->insert([
            'time_number' => '16:00',
        ]);
        DB::table('times')->insert([
            'time_number' => '17:00',
        ]);
        DB::table('times')->insert([
            'time_number' => '18:00',
        ]);
        DB::table('times')->insert([
            'time_number' => '19:00',
        ]);
    }
}

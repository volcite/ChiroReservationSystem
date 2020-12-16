<?php

use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            'reservation_date' => '2021-3-9',
            'cource_id' => 3,
            'name' => '佐々木明子',
            'age' => 53,
            'gender' => 1,
            'email' => 'sasaki@sasaki.com',
            'phone_number' => 123456789,
        ]);
        DB::table('reservations')->insert([
            'reservation_date' => '2021-3-25',
            'cource_id' => 3,
            'name' => '小林卓',
            'age' => 34,
            'gender' => 2,
            'email' => 'kobayashi@kobayashi.com',
            'phone_number' => 123456789,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class CourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cources')->insert([
            'cource_name' => '全身の調整',
        ]);
        DB::table('cources')->insert([
            'cource_name' => '骨盤のゆがみ',
        ]);
        DB::table('cources')->insert([
            'cource_name' => 'リフトアップ',
        ]);
        DB::table('cources')->insert([
            'cource_name' => 'ダイエットプログラム',
        ]);
        DB::table('cources')->insert([
            'cource_name' => '慢性腰痛',
        ]);
        DB::table('cources')->insert([
            'cource_name' => '慢性頸部痛',
        ]);
        DB::table('cources')->insert([
            'cource_name' => '慢性膝痛',
        ]);
        DB::table('cources')->insert([
            'cource_name' => 'その他',
        ]);
    }
}

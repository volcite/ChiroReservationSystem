<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('courses')->truncate();   //全レコード削除

        DB::table('courses')->insert([
            'course_name' => '全身の調整',
            'base_price' => '6000',
            'another_price'=> '2980'    //初回
        ]);
        DB::table('courses')->insert([
            'course_name' => '骨盤のゆがみ',
            'base_price' => '6000',
            'another_price'=> '2980'    //初回
        ]);
        DB::table('courses')->insert([
            'course_name' => 'リフトアップ',
            'another_price'=> '1980'    //30分
        ]);
        DB::table('courses')->insert([
            'course_name' => 'ダイエットプログラム',
            'another_price'=> '1000'    //体験
        ]);
        DB::table('courses')->insert([
            'course_name' => '慢性腰痛',
            'base_price' => '2~4000'
        ]);
        DB::table('courses')->insert([
            'course_name' => '慢性頸部痛',
            'base_price' => '2~4000'
        ]);
        DB::table('courses')->insert([
            'course_name' => '慢性膝痛',
            'base_price' => '2~4000'
        ]);
        DB::table('courses')->insert([
            'course_name' => 'その他',
        ]);
    }
}

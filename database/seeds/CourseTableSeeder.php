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
        DB::table('courses')->insert([
            'course_name' => '全身の調整',
        ]);
        DB::table('courses')->insert([
            'course_name' => '骨盤のゆがみ',
        ]);
        DB::table('courses')->insert([
            'course_name' => 'リフトアップ',
        ]);
        DB::table('courses')->insert([
            'course_name' => 'ダイエットプログラム',
        ]);
        DB::table('courses')->insert([
            'course_name' => '慢性腰痛',
        ]);
        DB::table('courses')->insert([
            'course_name' => '慢性頸部痛',
        ]);
        DB::table('courses')->insert([
            'course_name' => '慢性膝痛',
        ]);
        DB::table('courses')->insert([
            'course_name' => 'その他',
        ]);
    }
}

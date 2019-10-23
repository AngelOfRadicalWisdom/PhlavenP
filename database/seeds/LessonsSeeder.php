<?php

use Illuminate\Database\Seeder;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
            [
                'lesson_ID'=>'kajfiahdiladadsoajda',
                'lesson_name'=>'DML',
                'chapter_ID'=>'ajndoansdandasdpa1312wd',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'lessondesc'=>'Data Modifying Language is used for modifying the database.',
                'parent_ID'=>''
            ],
            [
                'lesson_ID'=>'kajfiahd131qweq1ajda',
                'lesson_name'=>'DDL',
                'chapter_ID'=>'ajndoansdandasdpa1312wd',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'lessondesc'=>'Data Definition Language is used for defining the database.',
                'parent_ID'=>''
            ],
            [
                'lesson_ID'=>'kajfi123123dadsoajda',
                'lesson_name'=>'DCL',
                'chapter_ID'=>'ajndoansdandasdpa1312wd',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'lessondesc'=>'Data Control Language is used for controlling the database.',
                'parent_ID'=>''
            ]
        ]);
    }
}

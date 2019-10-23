<?php

use Illuminate\Database\Seeder;

class NodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->insert([
            [
                'chapter_ID'=>'ajndoansdandasdpa1312wd',
                'chapter_name'=>'SQL',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'description'=>'Structured Query Language is a language that allows the user to manipulate the database.'
            ],
            [
                'chapter_ID'=>'adakjndkajnoafaip1231a',
                'chapter_name'=>'OOP',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'description'=>'Object-Oriented Programming is a programming language organized around data rather than logic.'
            ],
            [
                'chapter_ID'=>'kjnckdadajndakm13121',
                'chapter_name'=>'Data Structures',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'description'=>'Data Structures is centralized around organizing and storing data in an efficient manner'
            ],
            [
                'chapter_ID'=>'adasdasdasaip1231a',
                'chapter_name'=>'Algorithm',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'description'=>'Algorithm is a computer based procedure or formula for approaching a problem.'
            ],
            [
                'chapter_ID'=>'adasda12131a1231a',
                'chapter_name'=>'PDL',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'description'=>'Program Design Language is a method for designing and documenting methods and procedures in software.'
            ],
            [
                'chapter_ID'=>'aadasdasdza1asa1231a',
                'chapter_name'=>'SAD',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'description'=>'Statistical Analysis and Design.'
            ],
            [
                'chapter_ID'=>'ad1231aasa123aip1231a',
                'chapter_name'=>'Basic Programming',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'description'=>'The Programming Basics.'
            ],
            [
                'chapter_ID'=>'adakj123asdadp1231a',
                'chapter_name'=>'C++',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'description'=>'C Programming'
            ]
        ]);
    }
}

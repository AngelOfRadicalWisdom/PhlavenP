<?php

use Illuminate\Database\Seeder;

class RevCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('revcenter')->insert([
            [
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'revcenter_name'=>'USJR CICCT'
            ],
            [
                'revcenter_ID'=>'1239i0anjkdnjnwoi1231',
                'revcenter_name'=>'USC IT'
            ],
            [
                'revcenter_ID'=>'u019830adjkadknjnzjc398',
                'revcenter_name'=>'PhilNits'
            ]
        ]);
    }
}

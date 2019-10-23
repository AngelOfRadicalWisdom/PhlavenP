<?php

use Illuminate\Database\Seeder;

class UserRevCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultData=[
            [
                'user_ID'=>'ADMIN1234123412',
                'revcenter_ID'=>'kjn198uandlajsdnaknlak',
                'token'=>'123'
            ],
            [
                'user_ID'=>'CHOCOLAT22314121',
                'revcenter_ID'=>'u019830adjkadknjnzjc398',
                'token'=>'456'
            ]
            

        ];
        
        DB::table('userrevcenter')->insert($defaultData);
    }
}

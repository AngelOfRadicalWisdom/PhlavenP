<?php

use Illuminate\Database\Seeder;

class SystemUsersSeeder extends Seeder
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
                'userid'=>'001',
                'username'=>'admin',
                'password'=>bcrypt('system'),
            ],
            [
                'userid'=>'002',
                'username'=>'aki',
                'password'=>bcrypt('queenofpain'),
            ]
            

        ];
        
        DB::table('systemusers')->insert($defaultData);
    }
}

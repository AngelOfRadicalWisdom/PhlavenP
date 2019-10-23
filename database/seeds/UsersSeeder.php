<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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
                'mobile_token'=>'123',
                'username'=>'admin',
                'password'=>bcrypt('123'),
                'email'=>'cicctusjr@gmail.com',
                'firstname'=>'Rabsky',
                'lastname'=>'del Rav',
                'gender'=>'Male',
                'isadmin'=>'1',
                'diagnostic'=>'0',
            ],
            [
                'user_ID'=>'CHOCOLAT22314121',
                'mobile_token'=>'456',
                'username'=>'chocolatefudge',
                'password'=>bcrypt('123'),  
                'email'=>'usc@gmail.com',
                'firstname'=>'Mayormita',
                'lastname'=>'Lalala',
                'gender'=>'Female',
                'isadmin'=>'1',
                'diagnostic'=>'0',
            ]
            

        ];
        
        DB::table('users')->insert($defaultData);
    }
}

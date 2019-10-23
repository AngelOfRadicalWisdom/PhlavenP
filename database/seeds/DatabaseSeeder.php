<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(RevCenterSeeder::class);
         $this->call(UsersSeeder::class);
         //$this->call(NodeSeeder::class);
         //$this->call(LessonsSeeder::class);
         $this->call(UserRevCenterSeeder::class);
    }
}

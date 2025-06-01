<?php

namespace Database\Seeders;
use App\Models\user;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = [
         [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('i23'),
            'level' => 'admin',
         ],
         [
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('i23'),
            'level' => 'kasir',
         ],
         [
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('i23'),
            'level' => 'manager',
         ],

       ];

       foreach ($user as $key => $value) {
           user::create($value);
       }

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
            [
                'id'         => "c4c812fe-fb75-4577-9759-2fedbe3efed1",
                'role'       => 'admin',
                'fullname'  => 'admin',
                'email'      => 'flashx@yopmail.com',
                'password'   => bcrypt('Test@123'),
                'verified' => 1,
                'active'   => 1
            ],
            [
                'id'         => "ad99667a-7489-45f3-82d7-0a642c2639e2",
                'role'       => 'business',
                'fullname'  => 'Flashx',
                'email'      => 'flashx.organizer@yopmail.com',
                'password'   => bcrypt('12345678'),
                'verified' => 1,
                'active'   => 1
            ],
        ];
        User::insert($data);
    }
}

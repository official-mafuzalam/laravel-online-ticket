<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CounterMaster;
use App\Models\CounterList;

class CreateUsersSeeder extends Seeder
{

    //  {php artisan db:seed --class=CreateUsersSeeder}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@friendsit.com',
                'type' => 1,
                'password' => bcrypt('123456'),
            ],
            // [
            //    'name'=>'Manager User',
            //    'email'=>'manager@friendsit.com',
            //    'type'=> 2,
            //    'password'=> bcrypt('123456'),
            // ],
            // [
            //    'name'=>'Agent User',
            //    'email'=>'agent@friendsit.com',
            //    'type'=>0,
            //    'password'=> bcrypt('123456'),
            // ],
        ];

        $counter_lists = [

            [
                'counter_id' => '1000',
                'coun_name' => 'Head office',
                'coun_add' => 'Head office',
                'time_deff' => 0,
            ],
        ];

        $counter_masters = [
            [
                'coun_name' => 'Head office',
                'coun_id' => '1000',
                'user_type' => 1,
                'user_id' => 10000,
                'user_name' => 'Admin User',
                'user_mobile' => '01747503257',
                'password' => '123456',
                'email' => 'admin@friendsit.com'
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }

        foreach ($counter_lists as $key => $counter) {
            CounterList::create($counter);
        }

        foreach ($counter_masters as $key => $counter_master) {
            CounterMaster::create($counter_master);
        }


       

    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                //Admin

                'firstname' => 'Section',
                'lastname' => 'Admin',
                'email' => 'SectionAdmin@gmail.com',
                'password' => Hash::make('asd@1234'),
                'gender' => 'male',
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                //User OR Customer

                'firstname' => 'Section',
                'lastname' => 'User',
                'email' => 'SectionUser@gmail.com',
                'password' => Hash::make('asd@1234'),
                'gender' => 'male',
                'role' => 'user',
                'status' => 'active',
            ]
        ]);
    }
}

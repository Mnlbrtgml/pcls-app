<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Administrator',
        //     'role' => 'admin',
        //     'email' => 'administrator@pcls.com',
        //     'password' => Hash::make('password'),

        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Staff',
        //     'role' => 'staff',
        //     'email' => 'staff@pcls.com',
        //     'password' => Hash::make('password'),
        // ]);


        $users = [
            [
                'name' => 'Administrator',
                'role' => 'admin',
                'email' => 'administrator@pcls.com',
                'password' => 'password',
            ],
            [
                'name' => 'Staff',
                'role' => 'staff',
                'email' => 'staff@pcls.com',
                'password' => 'password',
            ]
        ];

        foreach ($users as $user) {
            $created_user = User::create([
                'name' => $user['name'],
                'role' => $user['role'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);

            $created_user->assignRole($user['role']);
        }
    }
}

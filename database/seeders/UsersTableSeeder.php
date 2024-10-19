<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Md. Milton',
                'email'          => 'milton2913@gmail.com',
                'password'       => bcrypt('123456789'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}

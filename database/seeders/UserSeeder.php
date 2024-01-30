<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
        [
            'id' => 1,
            'first_name' => 'Admin Dexter',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234567890'),
            'type' => '1',
        ],
        [
            'id' => 2,
            'first_name' => 'John Doe',
            'email' => 'employee1@gmail.com',
            'password' => bcrypt('1234567890'),
            'type' => '0',
        ],
        [
            'id' => 3,
            'first_name' => 'Jane Doe',
            'email' => 'employee2@gmail.com',
            'password' => bcrypt('1234567890'),
            'type' => '0',
        ]
    ]);
    }
}

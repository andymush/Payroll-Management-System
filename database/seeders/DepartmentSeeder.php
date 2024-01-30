<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departments;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departments::insert([
            [
                'dept_name' => 'Software Engineering',
                'dept_description' => 'maintenance of softwares',
                'dept_status' => 'on site',
                'dept_code' => 'SOFT-1'
            ],
            [
                'dept_name' => 'Quality Assurance',
                'dept_description' => 'testing and inspecting the softwares',
                'dept_status' => 'on site',
                'dept_code' => 'SOFT-2'
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employees;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::insert([
            [
                'UserId' => 2,
                'DeptId' => '1',
                'EmpCode' => 'EMP-0001'
            ],
            [
                'UserId' => 3,
                'DeptId' => '2',
                'EmpCode' => 'EMP-0002'
            ]
        
        ]);
    }
}

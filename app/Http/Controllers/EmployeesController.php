<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Departments;
use DateTime;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;

        $employeeDetails = Employees::select('emp_id', 'DeptId')
            ->where('UserId', $user)
            ->with('department')
            ->first();

        $currentDate = date('l, jS, Y');

        if ($employeeDetails) {
            $employeeId = $employeeDetails->emp_id;
            $employeeDept = $employeeDetails->department->dept_name;

            $employeeDetailsArray = [
                "employeeId" => $employeeId,
                "department" => $employeeDept,
                "currentDate" => $currentDate,
            ];
        } else {
            Log::info("Employee not found for the authenticated user.");
        }

        return Inertia::render('Employees/Dashboard', [
            'employeeDetails' => $employeeDetailsArray,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employees $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employees)
    {
        //
    }
}

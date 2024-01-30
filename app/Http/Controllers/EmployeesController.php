<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Departments;
use DateTime;
use App\Models\Attendance;

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

        $employeeAttendance = Attendance::where('emp_id', $employeeDetails->emp_id)
            ->where('date', date('l, jS, Y'))
            ->select('id','emp_id', 'date', 'time_in', 'time_out')
            ->first();

        $attendance = "Absent";
        $attendanceId = null;
        $clockedOut = null;
        if ($employeeAttendance !== null) {
            if ($employeeAttendance->time_in === null) {
                $attendance = "Absent";
            } elseif ($employeeAttendance->time_out === null) {
                $attendance = "Present" ;
                Log::info("Present");
                $attendanceId = $employeeAttendance->id;
            } else {
                $attendance = "Clocked-Out";
                $clockedOut = $employeeAttendance->time_out;
            }
        } else {
            Log::info("Absent");
        }

        // Log::info($employeeAttendance);

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
            'attendance' => $attendance,
            'attendanceId' => $attendanceId,
            'clockedOut' => $clockedOut,
        ]);

    }

    public function attendance()
    {
        $user = auth()->user()->id;

        $empId = Employees::select('emp_id')
            ->where('UserId', $user)
            ->first();
        
        Log::info($empId);
        $employeeAttendance = Attendance::where('emp_id', $empId->emp_id)
            ->select('date', 'time_in', 'time_out', 'hours_worked')
            ->get();
            
            return Inertia::render('Employees/Attendance', [
                'empId' => $empId,
                'employeeAttendance' => $employeeAttendance,
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

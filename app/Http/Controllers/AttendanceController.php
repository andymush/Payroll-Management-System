<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //Log::info($request);

        $attendance = Attendance::create([
            'emp_id' => $request->employee_id,
            'date' => $request->current_date,
            'time_in' => $request->time_in,
        ]);
        $attendance->save();

        // return redirect()->back()->with(['success', 'Attendance marked successfully.']);
        return response()->json([
            'message' => 'Attendance marked successfully',
            'attendance' => $attendance
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        Log::info($request);
        Log::info($attendance->time_in);

        $attendance->time_out = $request->time_out;

        // Calculate the hours worked
        $timeIn = $attendance->time_in;
        $timeOut = $attendance->time_out;

        // Check if both time_in and time_out are set
        if ($timeIn && $timeOut) {
            $hoursWorked = $this->calculateHoursWorked($timeOut,$timeIn);

            // Update the 'hours_worked' field in the database
            $attendance->hours_worked = $hoursWorked;
            Log::info($hoursWorked);
        }

        $attendance->save();

        // You may return a response if needed, for example:
        return response()->json([
            'message' => 'Attendance updated successfully',
            'time_out' => $attendance->time_out,
        ]);
        
    }


    private function calculateHoursWorked($timeIn, $timeOut)
    {
        $datetimeIn = \DateTime::createFromFormat('H:i:s', $timeIn);
        $datetimeOut = \DateTime::createFromFormat('H:i:s', $timeOut);

        $interval = $datetimeOut->diff($datetimeIn);

        // Get the total minutes
        $totalMinutes = $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;

        if ($totalMinutes >= 60) {
            // If total minutes is 60 or more, display as hours and minutes
            $hoursWorked = sprintf('%d:%02d', $interval->h, $interval->i);
        } else {
            // Otherwise, display as minutes only
            $hoursWorked = $totalMinutes . ' mins';
        }

        return $hoursWorked;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}

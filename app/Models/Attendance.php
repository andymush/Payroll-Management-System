<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'attendance';

    protected $fillable = [
        'emp_id',
        'date',
        'time_in',
        'time_out',
        'hours_worked'
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'emp_id');
    }
}

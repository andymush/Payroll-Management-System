<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employees extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'employees';

    //protected $primaryKey = 'emp_id';

    protected $fillable = [
        'UserId',
        'DeptId',
        'EmpCode',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function department()
    {
        return $this->belongsTo(Departments::class, 'DeptId');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'id');
    }
}

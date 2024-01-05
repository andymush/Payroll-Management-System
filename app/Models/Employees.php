<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employees extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'employees';

    protected $primaryKey = 'emp_id';

    protected $fillable = [
        'emp_code',
        'emp_password',
        'first_name',
        'last_name',
        'emp_email',
        'emp_phone',
        'emp_country',
        'emp_address',
        'emp_city',
        'identification_number',
        'identification_document',
        'joining_date',
        'photo',
        'designation',
        'department',
        'bank_name',
        'bank_account_number',
    ];
}

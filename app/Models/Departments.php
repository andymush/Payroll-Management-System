<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departments extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'departments';

    protected $primaryKey = 'dept_id';

    protected $fillable = [
        'dept_name',
        'dept_description',
        'dept_status',
        'dept_code'
    ];

}

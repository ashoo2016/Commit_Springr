<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
     protected $fillable = [
        'employee_name', 'employee_email', 'date_of_joining','date_of_leaving','employee_avatar','is_working'
    ];
}

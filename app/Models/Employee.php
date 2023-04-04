<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }
    protected $fillable = [
        'name',
        'age',
        'salary',
        'gender',
        'hired_date',
        'job_title',
        'manager_id',
    ];
}
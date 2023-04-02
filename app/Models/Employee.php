<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;
// mass assignment fields 
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'photo',
        'department_id',
    ];


    // employee belongs to department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}

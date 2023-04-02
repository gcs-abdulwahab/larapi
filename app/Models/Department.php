<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class Department extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'name',
        'description',
    ];


    // department has many employees
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}

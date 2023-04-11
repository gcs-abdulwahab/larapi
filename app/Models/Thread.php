<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    // create fillables
    protected $fillable = [
        
        'is_active',
        'tag_id',
    ];


}

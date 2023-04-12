<?php

namespace App\Models;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'code',
        'name',
        'description',
        'owner_id',
    ];

    // tag has many threads
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    // a tag belongs to one user
    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }


}
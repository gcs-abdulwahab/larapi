<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

// foreign key is owner_id
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // a group has many tags
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

}
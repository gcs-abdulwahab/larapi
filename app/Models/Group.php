<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'icon',
        'owner_id',
    ];

    // group has many users
    public function users()
    {
        return $this->belongsToMany(User::class , 'group_user')->withTimestamps();
    }


// foreign key is owner_id
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }


}

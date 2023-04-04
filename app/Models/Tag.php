<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'owner_id',
    ];

    // a tag belongs to one user
    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }


}
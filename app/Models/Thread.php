<?php

namespace App\Models;

// use message model
use App\Models\Message;
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

    // Thread has many messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }



}

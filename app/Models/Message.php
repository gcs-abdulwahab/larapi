<?php

namespace App\Models;

use App\Enums\MessageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    // create casts for MessageTypeEnum
    protected $casts = [
        'type' => MessageType::class,
    ];


    

}

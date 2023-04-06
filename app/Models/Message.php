<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\MessageType;

class Message extends Model
{
    use HasFactory;


    // create casts for MessageTypeEnum
    protected $casts = [
        'type' => MessageType::class,
    ];

}

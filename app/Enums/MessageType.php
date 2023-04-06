<?php
namespace App\Enums;
enum MessageType:string {
    case TEXT = 'text';
    case AUDIO = 'audio';
    case IMAGE = 'image';
    case VIDEO = 'video';
    case FILE = 'file';
}
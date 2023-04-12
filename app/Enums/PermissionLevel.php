<?php
namespace App\Enums;
enum PermissionLevel:string {
    
    case PRIVATE = 'private';
    case INDIVIDUAL = 'individual';

    case PROTECTED = 'protected';
    case PUBLIC = 'public';

}
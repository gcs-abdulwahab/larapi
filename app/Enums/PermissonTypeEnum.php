<?php 
namespace App\Enums;

enum PermissionTypeEnum: string
{
    
    case READ = 'read';
    case WRITE = 'write';
    case BOTH = 'both';
    case NONE = 'none';
}
 

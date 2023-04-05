<?php 
namespace App\Enums;




enum PermissionType: string
{
    

    case READ = 'read';
    case WRITE = 'write';
    case BOTH = 'both';
    case NONE = 'none';
}
 

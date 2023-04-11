<?php

namespace App\Models;

use App\Enums\PermissionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupPermissionThread extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'group_id',       
        'thread_id',
    ];

    // create a function that takes a group id and tag id and returns the permission
    public static function getPermission($group_id, $thread_id)
    {
        // get the permission id
        $groupPermissionThread = GroupPermissionThread::where('group_id', $group_id)->where('thread_id', $thread_id)->first();

        // get the permission
        return $groupPermissionThread->permission;
    }

// create cast for PermissionTypeEnum
    protected $casts = [
        'permission' => PermissionType::class,
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupPermissionTag extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'group_id',
       
        'tag_id',
    ];

    // create a function that takes a group id and tag id and returns the permission
    public static function getPermission($group_id, $tag_id)
    {
        // get the permission id
        $groupPermissionTag = GroupPermissionTag::where('group_id', $group_id)->where('tag_id', $tag_id)->first();

        // get the permission

        return $groupPermissionTag->permission;
    }

// create cast for PermissionTypeEnum
    protected $casts = [
        'permission' => PermissionType::class,
    ];

}

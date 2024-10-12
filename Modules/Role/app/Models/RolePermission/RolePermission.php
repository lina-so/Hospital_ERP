<?php

namespace Modules\Role\Models\RolePermission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Role\Database\Factories\RolePermission/RolePermissionFactory;

class RolePermission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): RolePermission/RolePermissionFactory
    // {
    //     // return RolePermission/RolePermissionFactory::new();
    // }
}

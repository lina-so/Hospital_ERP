<?php

namespace Modules\Role\Models\Role;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Role\Database\Factories\Role/RoleFactory;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): Role/RoleFactory
    // {
    //     // return Role/RoleFactory::new();
    // }
}

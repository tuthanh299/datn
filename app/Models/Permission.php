<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public function PermissionChildren()
    {
        return $this->hasMany(Permission::class, foreignKey: 'parent_id');
    }
}

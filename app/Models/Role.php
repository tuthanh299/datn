<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'display_name',
    ];
    public function Permissions()
    {
        return $this->belongsToMany(Permission::class, table:'permission_role', foreignPivotKey: 'role_id', relatedPivotKey: 'permission_id');
    }
}

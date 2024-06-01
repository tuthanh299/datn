<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'display_name',
    ];
    public function Permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', foreignPivotKey: 'role_id', relatedPivotKey: 'permission_id');
    }
}

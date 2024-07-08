<?php 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

function CheckPermissionAdmin($id_user, $permissionCheck)
{
    $id_role = DB::table('role_users')->where('user_id', $id_user)->pluck('role_id');
    $arrPermission = DB::table('permission_roles')->whereIn('role_id', $id_role)->pluck('permission_id');
    $arrKeyPermission = DB::table('permissions')->whereIn('id', $arrPermission)->pluck('key_permissions');

    if (Str::contains($permissionCheck, $arrKeyPermission)){
        return true;
    } else {
        return false;
        // return true;
    }

   
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleAddRequest;
use App\Http\Requests\RoleEditRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use DeleteModelTrait;
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;

    }
    public function index(Request $request)
    {

        $search = $request->input('search_keyword');
        $roles = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $roles = $this->role::select('id', 'name', 'display_name')
                ->where('name', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(10);
            $roles->setPath('roles?search_keyword=' . $search);
        } else {
            $roles = $this->role->latest()->paginate(10);
        }

        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionsParent'));
    }
    public function store(RoleAddRequest $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);

        $role->Permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');

    }
    public function edit($id)
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permissionsChecked = $role->Permissions;
        return view('admin.role.edit', compact('permissionsParent', 'role', 'permissionsChecked'));
    }
    public function update(RoleEditRequest $request, $id)
    {
        $role = $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role->Permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function delete($id)
    {

        return $this->deleteModelTrait($id, $this->role);

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    use DeleteModelTrait;

    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index(Request $request)
    {
        $search = $request->input('search_keyword');
        $searchresult = null;
        $users = null;
        if ($search) {
            $search = '%' . $search . '%';
            $searchresult = $this->user::select('id', 'first_name', 'email')
                ->where('email', 'LIKE', $search)
                ->latest()
                ->paginate(10);
        } else {
            $users = $this->user->latest()->paginate(10);
        }

        return view('admin.user.index', compact('users', 'searchresult'));
    }
    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }
    public function store(UserAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $roleUser = $user->roles;
        return view('admin.user.edit', compact('roles', 'user', 'roleUser'));
    }

    public function update(UserEditRequest $request, $id)
    {

        try {
            $update['first_name'] = $request->first_name;
            $update['last_name'] = $request->last_name;
            $update['phone'] = $request->phone;
            $update['address'] = $request->address;
            if (!empty($request->password)) {
                $update['password'] = $request->password;
            }

            DB::beginTransaction();
            $this->user->find($id)->update($update);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }

    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);

    }

}

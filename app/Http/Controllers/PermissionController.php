<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    public function index()
    {
        $roles=Role::all();
        $permissions=Permission::all();
        return view('permission.index',compact('roles','permissions'));
    }

    public function storerole(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);
        $role=Role::create(['name'=>$request->name]);
        flash('Role '.$role->name.' created successfully.')->success()->important();
        return back();
    }

    public function assignPermissionToRole(Role $role, $permission)
    {
        $role->givePermissionTo($permission);
        flash('Permission assigned seccessfully.')->success()->important();
        return back();
    }

    public function storepermission(Request $request)
    {
        # code...
    }

    public function revokeRolePermission(Role $role, $permission)
    {
        
        $role->revokePermissionTo($permission);
        flash('Permission revoked successfully')->error()->important();
        return back();
    }
}

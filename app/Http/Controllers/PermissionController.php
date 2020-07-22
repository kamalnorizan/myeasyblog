<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    public function index()
    {
        return view('permission.index');
    }

    public function storerole()
    {
        # code...
    }

    public function storepermission()
    {
        # code...
    }
}
